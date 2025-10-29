<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Enums\ContentStatus;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image')
                    ->label('Image')
                    ->circular()
                    ->size(40)
                    ->disk('public')
                    ->visibility('public'),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('author.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => $state->label())
                    ->badge()
                    ->color(fn ($state) => $state->color())
                    ->sortable(),

                TextColumn::make('categories.name')
                    ->label('Categories')
                    ->badge()
                    ->separator(',')
                    ->limitList(2)
                    ->toggleable(),

                TextColumn::make('tags.name')
                    ->label('Tags')
                    ->badge()
                    ->color('gray')
                    ->separator(',')
                    ->limitList(3)
                    ->toggleable(),

                TextColumn::make('published_at')
                    ->label('Published')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options(ContentStatus::class)
                    ->multiple(),

                SelectFilter::make('author')
                    ->label('Author')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('categories')
                    ->label('Category')
                    ->relationship('categories', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                Action::make('view')
                    ->icon(Heroicon::OutlinedEye)
                    ->url(fn ($record) => route('posts.show', $record->slug))
                    ->openUrlInNewTab(),
                EditAction::make(),
                Action::make('clone')
                    ->icon(Heroicon::OutlinedDocumentDuplicate)
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $timestamp = now()->timestamp;
                        $clonedData = $record->replicate();
                        $clonedData->title = $record->title.'-copy-'.$timestamp;
                        $clonedData->slug = $record->slug.'-'.$timestamp;
                        $clonedData->save();

                        // Clone relationships
                        if ($record->categories()->exists()) {
                            $clonedData->categories()->sync($record->categories->pluck('id'));
                        }

                        if ($record->tags()->exists()) {
                            $clonedData->tags()->sync($record->tags->pluck('id'));
                        }

                        \Filament\Notifications\Notification::make()
                            ->success()
                            ->title('Post Cloned')
                            ->body('The post has been successfully cloned with all categories and tags.')
                            ->send();
                    }),
            ])
            ->recordUrl(fn ($record) => \App\Filament\Resources\Posts\PostResource::getUrl('edit', ['record' => $record]))
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}

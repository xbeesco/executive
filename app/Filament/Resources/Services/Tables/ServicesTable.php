<?php

namespace App\Filament\Resources\Services\Tables;

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

class ServicesTable
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
                    ->limit(50)
                    ->description(fn ($record) => $record->excerpt ? \Str::limit($record->excerpt, 60) : null),

                TextColumn::make('icon')
                    ->label('Icon')
                    ->html()
                    ->formatStateUsing(fn ($state) => $state ? "<i class='{$state}'></i>" : '-')
                    ->alignCenter(),

                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => $state->label())
                    ->badge()
                    ->color(fn ($state) => $state->color())
                    ->sortable(),

                TextColumn::make('features')
                    ->label('Features')
                    ->badge()
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state).' features' : '0 features')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->toggleable(),

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
            ])
            ->recordActions([
                Action::make('view')
                    ->icon(Heroicon::OutlinedEye)
                    ->url(fn ($record) => route('services.show', $record->slug))
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

                        \Filament\Notifications\Notification::make()
                            ->success()
                            ->title('Service Cloned')
                            ->body('The service has been successfully cloned.')
                            ->send();
                    }),
            ])
            ->recordUrl(fn ($record) => \App\Filament\Resources\Services\ServiceResource::getUrl('edit', ['record' => $record]))
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}

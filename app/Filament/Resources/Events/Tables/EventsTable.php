<?php

namespace App\Filament\Resources\Events\Tables;

use App\Enums\ContentStatus;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class EventsTable
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
                    ->description(fn ($record) => $record->description ? \Str::limit($record->description, 60) : null),

                TextColumn::make('location')
                    ->label('Location')
                    ->searchable()
                    ->limit(30)
                    ->toggleable(),

                TextColumn::make('start_date')
                    ->label('Start Date')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('End Date')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => $state->label())
                    ->badge()
                    ->color(fn ($state) => $state->color())
                    ->sortable(),

                TextColumn::make('max_attendees')
                    ->label('Max Attendees')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

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

                Filter::make('start_date')
                    ->label('Start Date')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('start_from')
                            ->label('From'),
                        \Filament\Forms\Components\DatePicker::make('start_until')
                            ->label('Until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['start_from'], fn ($q, $date) => $q->whereDate('start_date', '>=', $date))
                            ->when($data['start_until'], fn ($q, $date) => $q->whereDate('start_date', '<=', $date));
                    }),
            ])
            ->recordActions([
                Action::make('view')
                    ->icon(Heroicon::OutlinedEye)
                    ->url(fn ($record) => route('events.show', $record->slug))
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
                            ->title('Event Cloned')
                            ->body('The event has been successfully cloned.')
                            ->send();
                    }),
            ])
            ->recordUrl(fn ($record) => \App\Filament\Resources\Events\EventResource::getUrl('edit', ['record' => $record]))
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('start_date', 'desc');
    }
}

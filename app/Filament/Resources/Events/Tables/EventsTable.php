<?php

namespace App\Filament\Resources\Events\Tables;

use App\Enums\ContentStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
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
                TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('location')
                    ->label('الموقع')
                    ->searchable()
                    ->limit(30),

                TextColumn::make('start_date')
                    ->label('تاريخ البداية')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('تاريخ النهاية')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->formatStateUsing(fn ($state) => $state->label())
                    ->badge()
                    ->color(fn ($state) => $state->color())
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options(ContentStatus::class),

                Filter::make('start_date')
                    ->label('تاريخ البداية')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('start_from')
                            ->label('من'),
                        \Filament\Forms\Components\DatePicker::make('start_until')
                            ->label('إلى'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['start_from'], fn ($q, $date) => $q->whereDate('start_date', '>=', $date))
                            ->when($data['start_until'], fn ($q, $date) => $q->whereDate('start_date', '<=', $date));
                    }),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('start_date', 'desc');
    }
}

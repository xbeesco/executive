<?php

namespace App\Filament\Resources\Services\Tables;

use App\Enums\ContentStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
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
                TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('icon')
                    ->label('الأيقونة')
                    ->html()
                    ->formatStateUsing(fn($state) => $state ? "<i class='{$state}'></i> {$state}" : '-'),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->formatStateUsing(fn($state) => $state->label())
                    ->badge()
                    ->color(fn($state) => $state->color())
                    ->sortable(),

                ImageColumn::make('featured_image')
                    ->label('الصورة')
                    ->circular(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options(ContentStatus::class),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}

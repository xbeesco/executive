<?php

namespace App\Filament\Resources\FormSubmissions\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class FormSubmissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('form.title')
                    ->label('الاستمارة')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('read')
                    ->label('تم القراءة')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),

                TextColumn::make('ip_address')
                    ->label('عنوان IP')
                    ->copyable()
                    ->searchable(),

                TextColumn::make('user_agent')
                    ->label('User Agent')
                    ->limit(50)
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإرسال')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('form')
                    ->label('الاستمارة')
                    ->relationship('form', 'title')
                    ->searchable(),

                TernaryFilter::make('read')
                    ->label('تم القراءة')
                    ->placeholder('الكل')
                    ->trueLabel('تم القراءة')
                    ->falseLabel('لم يُقرأ'),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('markAsRead')
                    ->label('تعليم كمقروء')
                    ->icon('heroicon-o-check')
                    ->action(fn ($record) => $record->update(['read' => true]))
                    ->visible(fn ($record) => ! $record->read),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}

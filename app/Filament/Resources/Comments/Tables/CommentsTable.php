<?php

namespace App\Filament\Resources\Comments\Tables;

use App\Enums\CommentStatus;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CommentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('post.title')
                    ->label('المقالة')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('author_name')
                    ->label('الاسم')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('content')
                    ->label('التعليق')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->formatStateUsing(fn($state) => $state->label())
                    ->badge()
                    ->color(fn($state) => $state->color())
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options(CommentStatus::class),

                SelectFilter::make('post')
                    ->label('المقالة')
                    ->relationship('post', 'title')
                    ->searchable(),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('approve')
                    ->label('الموافقة')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->action(fn($record) => $record->update(['status' => CommentStatus::APPROVED]))
                    ->visible(fn($record) => $record->status !== CommentStatus::APPROVED),

                Action::make('reject')
                    ->label('الرفض')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->action(fn($record) => $record->update(['status' => CommentStatus::REJECTED]))
                    ->visible(fn($record) => $record->status !== CommentStatus::REJECTED),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('approve')
                        ->label('الموافقة على المحدد')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->action(fn($records) => $records->each->update(['status' => CommentStatus::APPROVED])),

                    BulkAction::make('reject')
                        ->label('رفض المحدد')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->action(fn($records) => $records->each->update(['status' => CommentStatus::REJECTED])),

                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}

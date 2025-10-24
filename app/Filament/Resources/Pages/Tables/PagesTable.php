<?php

namespace App\Filament\Resources\Pages\Tables;

use App\Enums\ContentStatus;
use App\Enums\PageType;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('URL Slug')
                    ->copyable()
                    ->sortable(),

                TextColumn::make('settings.page_type')
                    ->label('Type')
                    ->formatStateUsing(fn ($state) => PageType::tryFrom($state)?->label() ?? $state)
                    ->badge()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => $state->label())
                    ->badge(fn ($state) => $state->color())
                    ->sortable(),

                ImageColumn::make('featured_image')
                    ->label('Image')
                    ->circular(),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options(ContentStatus::class),

                SelectFilter::make('page_type')
                    ->label('Page Type')
                    ->attribute('settings->page_type')
                    ->options(PageType::class),
            ])
            ->recordActions([
                Action::make('view')
                    ->label('View')
                    ->icon(Heroicon::OutlinedEye)
                    ->url(fn ($record) => route('pages.show', $record->slug))
                    ->openUrlInNewTab(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

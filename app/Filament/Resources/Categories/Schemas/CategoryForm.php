<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 8 Columns
                Section::make('Category Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique('categories', 'slug', ignoreRecord: true)
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(4),
                    ])
                    ->columnSpan(8),

                // Sidebar Section - 4 Columns
                Section::make('Category Settings')
                    ->schema([
                        Select::make('parent_id')
                            ->label('Parent Category')
                            ->options(function ($record) {
                                return \App\Models\Category::query()
                                    ->when($record, fn ($query) => $query->where('id', '!=', $record->id))
                                    ->whereNull('parent_id')
                                    ->pluck('name', 'id');
                            })
                            ->searchable()
                            ->preload(),
                    ])
                    ->columnSpan(4),
            ]);
    }
}

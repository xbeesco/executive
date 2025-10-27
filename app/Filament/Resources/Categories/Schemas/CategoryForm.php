<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
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
                    ->description('Basic information about the category')
                    ->schema([
                        Fieldset::make('Details')
                            ->columns(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->columnSpan(2),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->unique('categories', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('Auto-generated from name')
                                    ->columnSpan(2),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(4)
                                    ->columnSpan(2),
                            ]),
                    ])
                    ->columnSpan(8),

                // Sidebar Section - 4 Columns
                Section::make('Category Settings')
                    ->schema([
                        Fieldset::make('Hierarchy')
                            ->schema([
                                Select::make('parent_id')
                                    ->label('Parent Category')
                                    ->relationship('parent', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->helperText('Select a parent if this is a sub-category'),
                            ]),
                    ])
                    ->columnSpan(4),
            ]);
    }
}

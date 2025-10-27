<?php

namespace App\Filament\Resources\Tags\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 8 Columns
                Section::make('Tag Information')
                    ->description('Basic information about the tag')
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
                                    ->unique('tags', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('Auto-generated from name')
                                    ->columnSpan(2),
                            ]),
                    ])
                    ->columnSpan(8),

                // Sidebar Section - 4 Columns
                Section::make('Tag Settings')
                    ->schema([
                        Fieldset::make('Statistics')
                            ->schema([
                                // Placeholder for future settings or stats
                            ]),
                    ])
                    ->columnSpan(4),
            ]);
    }
}

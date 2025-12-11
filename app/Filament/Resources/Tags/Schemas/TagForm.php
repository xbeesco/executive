<?php

namespace App\Filament\Resources\Tags\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 8 Columns
                Section::make('Tag Information')
                    ->schema([
                        Fieldset::make('Details')
                            ->columns(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                        if (($get('slug') ?? '') !== Str::slug($old)) {
                                            return;
                                        }
                                        $set('slug', Str::slug($state));
                                    })
                                    ->columnSpan(2),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->unique('tags', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
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

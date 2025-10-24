<?php

namespace App\Filament\Resources\Tags\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات الوسم')
                    ->description('المعلومات الأساسية للوسم')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('الاسم')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true),

                                TextInput::make('slug')
                                    ->label('الرابط (Slug)')
                                    ->required()
                                    ->unique('tags', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('يتم إنشاؤه تلقائياً من الاسم'),
                            ]),
                    ]),
            ]);
    }
}

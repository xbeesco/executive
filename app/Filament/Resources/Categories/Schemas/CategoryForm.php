<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات التصنيف')
                    ->description('المعلومات الأساسية للتصنيف')
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
                                    ->unique('categories', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('يتم إنشاؤه تلقائياً من الاسم'),

                                Textarea::make('description')
                                    ->label('الوصف')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                Select::make('parent_id')
                                    ->label('التصنيف الأب')
                                    ->relationship('parent', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->helperText('اختر تصنيف أب إذا كان هذا تصنيف فرعي')
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}

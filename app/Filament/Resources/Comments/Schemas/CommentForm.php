<?php

namespace App\Filament\Resources\Comments\Schemas;

use App\Enums\CommentStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات المعلق')
                    ->description('معلومات الشخص الذي ترك التعليق')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('author_name')
                                    ->label('الاسم')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('author_email')
                                    ->label('البريد الإلكتروني')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('author_website')
                                    ->label('الموقع الإلكتروني')
                                    ->url()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                            ]),
                    ]),

                Section::make('محتوى التعليق')
                    ->description('نص التعليق')
                    ->schema([
                        Textarea::make('content')
                            ->label('التعليق')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),

                Section::make('الحالة والارتباطات')
                    ->description('حالة التعليق والمقالة المرتبطة')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('status')
                                    ->label('الحالة')
                                    ->options(CommentStatus::class)
                                    ->required()
                                    ->default(CommentStatus::PENDING->value),

                                Select::make('post_id')
                                    ->label('المقالة')
                                    ->relationship('post', 'title')
                                    ->searchable()
                                    ->required(),

                                Select::make('parent_id')
                                    ->label('رد على تعليق')
                                    ->relationship('parent', 'author_name')
                                    ->searchable()
                                    ->helperText('اختر تعليق إذا كان هذا رد على تعليق آخر')
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}

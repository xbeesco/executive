<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Enums\ContentStatus;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات أساسية')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('العنوان')
                                    ->required()
                                    ->live(onBlur: true),

                                TextInput::make('slug')
                                    ->label('الرابط')
                                    ->required()
                                    ->unique('posts', 'slug', ignoreRecord: true),

                                Textarea::make('excerpt')
                                    ->label('الملخص')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                Select::make('author_id')
                                    ->label('الكاتب')
                                    ->relationship('author', 'name')
                                    ->searchable()
                                    ->required(),

                                Select::make('status')
                                    ->label('الحالة')
                                    ->options(ContentStatus::class)
                                    ->required(),

                                FileUpload::make('featured_image')
                                    ->label('الصورة المميزة')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/posts'),
                            ]),
                    ]),

                Section::make('التصنيفات والوسوم')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('categories')
                                    ->label('التصنيفات')
                                    ->relationship('categories', 'name')
                                    ->multiple()
                                    ->searchable(),

                                Select::make('tags')
                                    ->label('الوسوم')
                                    ->relationship('tags', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->label('اسم الوسم')
                                            ->required(),
                                    ]),
                            ]),
                    ]),

                Section::make('محتوى المقالة')
                    ->schema([
                        Builder::make('content')
                            ->label('')
                            ->blocks([
                                Block::make('text')
                                    ->label('نص')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        Textarea::make('text')
                                            ->label('المحتوى')
                                            ->required()
                                            ->rows(5),
                                    ]),

                                Block::make('image')
                                    ->label('صورة')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label('الصورة')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images/blocks')
                                            ->required(),

                                        TextInput::make('caption')
                                            ->label('التوضيح'),
                                    ]),

                                Block::make('quote')
                                    ->label('اقتباس')
                                    ->icon('heroicon-o-quote')
                                    ->schema([
                                        Textarea::make('text')
                                            ->label('النص')
                                            ->required(),

                                        TextInput::make('author')
                                            ->label('المؤلف'),
                                    ]),
                            ])
                            ->columnSpanFull(),
                    ]),

                Section::make('معلومات النشر')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                DateTimePicker::make('published_at')
                                    ->label('تاريخ النشر'),
                            ]),
                    ]),

                Section::make('معلومات SEO')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('seo.meta_title')
                                    ->label('Meta Title'),

                                TextInput::make('seo.meta_keywords')
                                    ->label('Meta Keywords'),

                                Textarea::make('seo.meta_description')
                                    ->label('Meta Description')
                                    ->rows(2)
                                    ->columnSpanFull(),

                                FileUpload::make('seo.og_image')
                                    ->label('صورة OG')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/seo')
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}

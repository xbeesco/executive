<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Enums\ContentStatus;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات أساسية')
                    ->description('المعلومات الأساسية للخدمة')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('العنوان')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true),

                                TextInput::make('slug')
                                    ->label('الرابط (Slug)')
                                    ->required()
                                    ->unique('services', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('يتم إنشاؤه تلقائياً من العنوان'),

                                Textarea::make('excerpt')
                                    ->label('الملخص')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->helperText('وصف قصير للخدمة'),

                                TextInput::make('icon')
                                    ->label('الأيقونة')
                                    ->placeholder('fas fa-rocket')
                                    ->helperText('Font Awesome icon class'),

                                Select::make('status')
                                    ->label('الحالة')
                                    ->options(ContentStatus::class)
                                    ->required()
                                    ->default(ContentStatus::DRAFT->value),

                                FileUpload::make('featured_image')
                                    ->label('الصورة المميزة')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/services')
                                    ->columnSpanFull(),
                            ]),
                    ]),

                Section::make('محتوى الخدمة')
                    ->description('بناء محتوى الخدمة باستخدام الكتل')
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
                                    ->icon('heroicon-o-chat-bubble-left-right')
                                    ->schema([
                                        Textarea::make('text')
                                            ->label('النص')
                                            ->required()
                                            ->rows(3),

                                        TextInput::make('author')
                                            ->label('المؤلف'),
                                    ]),
                            ])
                            ->columnSpanFull(),
                    ]),

                Section::make('مميزات الخدمة')
                    ->description('قائمة المميزات والخصائص')
                    ->schema([
                        Repeater::make('features')
                            ->label('')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('اسم الميزة')
                                            ->required(),

                                        TextInput::make('icon')
                                            ->label('الأيقونة')
                                            ->default('fas fa-check')
                                            ->placeholder('fas fa-check'),
                                    ]),
                            ])
                            ->addActionLabel('إضافة ميزة')
                            ->reorderable()
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),

                Section::make('معلومات SEO')
                    ->description('تحسين محركات البحث')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('seo.meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(60)
                                    ->helperText('الطول الأمثل: 50-60 حرف'),

                                TextInput::make('seo.meta_keywords')
                                    ->label('Meta Keywords')
                                    ->helperText('كلمات مفتاحية مفصولة بفواصل'),

                                Textarea::make('seo.meta_description')
                                    ->label('Meta Description')
                                    ->rows(2)
                                    ->maxLength(160)
                                    ->helperText('الطول الأمثل: 150-160 حرف')
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

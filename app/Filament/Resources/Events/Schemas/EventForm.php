<?php

namespace App\Filament\Resources\Events\Schemas;

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

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات أساسية')
                    ->description('المعلومات الأساسية للفعالية')
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
                                    ->unique('events', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('يتم إنشاؤه تلقائياً من العنوان'),

                                Textarea::make('description')
                                    ->label('الوصف')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->helperText('وصف مختصر للفعالية'),

                                Select::make('status')
                                    ->label('الحالة')
                                    ->options(ContentStatus::class)
                                    ->required()
                                    ->default(ContentStatus::DRAFT->value),

                                FileUpload::make('featured_image')
                                    ->label('الصورة المميزة')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/events')
                                    ->columnSpanFull(),
                            ]),
                    ]),

                Section::make('التواريخ والمكان')
                    ->description('معلومات التوقيت والمكان')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                DateTimePicker::make('start_date')
                                    ->label('تاريخ البداية')
                                    ->required()
                                    ->native(false),

                                DateTimePicker::make('end_date')
                                    ->label('تاريخ النهاية')
                                    ->native(false)
                                    ->after('start_date'),

                                TextInput::make('location')
                                    ->label('الموقع')
                                    ->maxLength(255)
                                    ->placeholder('القاهرة، مصر'),

                                TextInput::make('max_attendees')
                                    ->label('الحد الأقصى للحضور')
                                    ->numeric()
                                    ->minValue(1)
                                    ->placeholder('100'),
                            ]),
                    ]),

                Section::make('محتوى الفعالية')
                    ->description('بناء محتوى الفعالية باستخدام الكتل')
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

                                Block::make('agenda')
                                    ->label('جدول الأعمال')
                                    ->icon('heroicon-o-calendar')
                                    ->schema([
                                        TextInput::make('time')
                                            ->label('الوقت')
                                            ->placeholder('10:00 AM'),

                                        TextInput::make('title')
                                            ->label('العنوان')
                                            ->required(),

                                        Textarea::make('description')
                                            ->label('الوصف')
                                            ->rows(2),
                                    ]),
                            ])
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

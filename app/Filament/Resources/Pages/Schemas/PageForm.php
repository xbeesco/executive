<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Enums\ArchiveContentType;
use App\Enums\ArchiveTemplate;
use App\Enums\ContentStatus;
use App\Enums\FooterStyle;
use App\Enums\HeaderStyle;
use App\Enums\PageType;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات أساسية')
                    ->description('معلومات الصفحة الأساسية')
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
                                    ->unique('pages', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('يتم إنشاؤه تلقائياً من العنوان'),

                                FileUpload::make('featured_image')
                                    ->label('الصورة المميزة')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/pages')
                                    ->columnSpanFull(),

                                Select::make('status')
                                    ->label('الحالة')
                                    ->options(ContentStatus::class)
                                    ->required(),
                            ]),
                    ]),

                Section::make('نوع الصفحة والإعدادات')
                    ->description('حدد نوع الصفحة والإعدادات الخاصة بها')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('settings.page_type')
                                    ->label('نوع الصفحة')
                                    ->options(PageType::class)
                                    ->required()
                                    ->live(),

                                Select::make('settings.header_style')
                                    ->label('مظهر الرأس')
                                    ->options(HeaderStyle::class)
                                    ->required()
                                    ->default(3),

                                Select::make('settings.footer_style')
                                    ->label('مظهر التذييل')
                                    ->options(FooterStyle::class)
                                    ->required()
                                    ->default(3),

                                Toggle::make('settings.show_title_bar')
                                    ->label('إظهار شريط العنوان')
                                    ->default(true),

                                // Conditional fields for archive pages
                                Select::make('settings.archive_content_type')
                                    ->label('نوع المحتوى')
                                    ->options(ArchiveContentType::class)
                                    ->hidden(fn($get) => $get('settings.page_type') !== PageType::ARCHIVE->value),

                                Select::make('settings.archive_template')
                                    ->label('قالب الأرشيف')
                                    ->options(ArchiveTemplate::class)
                                    ->hidden(fn($get) => $get('settings.page_type') !== PageType::ARCHIVE->value),
                            ]),
                    ]),

                Section::make('محتوى الصفحة')
                    ->description('بناء محتوى الصفحة باستخدام الكتل')
                    ->schema([
                        Builder::make('content')
                            ->label('')
                            ->blocks([
                                Block::make('hero')
                                    ->label('بطل الصفحة')
                                    ->icon('heroicon-o-image')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('العنوان')
                                            ->required(),

                                        TextInput::make('subtitle')
                                            ->label('العنوان الفرعي'),

                                        FileUpload::make('image')
                                            ->label('الصورة')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images/blocks'),
                                    ]),

                                Block::make('text')
                                    ->label('نص')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        TextInput::make('text')
                                            ->label('المحتوى')
                                            ->required(),
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

                                Block::make('services_grid')
                                    ->label('شبكة الخدمات')
                                    ->icon('heroicon-o-squares-2x2')
                                    ->schema([
                                        Select::make('columns')
                                            ->label('عدد الأعمدة')
                                            ->options([
                                                2 => '2',
                                                3 => '3',
                                                4 => '4',
                                            ])
                                            ->default(3),
                                    ]),

                                Block::make('archive_grid')
                                    ->label('شبكة المحتوى')
                                    ->icon('heroicon-o-bars-3')
                                    ->schema([
                                        Select::make('columns')
                                            ->label('عدد الأعمدة')
                                            ->options([
                                                2 => '2',
                                                3 => '3',
                                                4 => '4',
                                            ])
                                            ->default(3),

                                        TextInput::make('per_page')
                                            ->label('عدد العناصر في الصفحة')
                                            ->numeric()
                                            ->default(12),
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

                                TextInput::make('seo.meta_description')
                                    ->label('Meta Description')
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

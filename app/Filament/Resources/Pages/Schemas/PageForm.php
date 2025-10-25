<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Enums\ArchiveContentType;
use App\Enums\ArchiveTemplate;
use App\Enums\ContentStatus;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(12)
                    ->schema([
                        // Content Builder - 9 Columns
                        Section::make()
                            ->schema([
                                Builder::make('content')
                                    ->blocks(self::getPageBuilderBlocks())
                                    ->collapsible(),
                            ])
                            ->columnSpan(9),

                        // Sidebar - 3 Columns
                        Grid::make(1)
                            ->schema([
                                // الإعدادات العامة
                                Fieldset::make('الإعدادات العامة')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('العنوان')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true),

                                        TextInput::make('slug')
                                            ->label('الرابط')
                                            ->required()
                                            ->unique('pages', 'slug', ignoreRecord: true)
                                            ->maxLength(255),

                                        Select::make('status')
                                            ->label('الحالة')
                                            ->options(ContentStatus::class)
                                            ->required(),

                                        FileUpload::make('featured_image')
                                            ->label('الصورة المميزة')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images/pages'),

                                        Toggle::make('settings.is_archive')
                                            ->label('صفحة أرشيف')
                                            ->default(false)
                                            ->live(),

                                        Select::make('settings.archive_content_type')
                                            ->label('نوع محتوى الأرشيف')
                                            ->options(ArchiveContentType::class)
                                            ->hidden(fn ($get) => ! $get('settings.is_archive')),

                                        Select::make('settings.archive_template')
                                            ->label('قالب الأرشيف')
                                            ->options(ArchiveTemplate::class)
                                            ->hidden(fn ($get) => ! $get('settings.is_archive')),
                                    ]),

                                // إعدادات التصميم
                                Fieldset::make('إعدادات التصميم')
                                    ->schema([
                                        Select::make('settings.header_style')
                                            ->label('نمط الهيدر')
                                            ->options([
                                                3 => 'Header Style 3',
                                                4 => 'Header Style 4',
                                                8 => 'Header Style 8',
                                            ])
                                            ->required()
                                            ->default(3),

                                        Select::make('settings.header_area_type')
                                            ->label('نوع منطقة الهيدر')
                                            ->options([
                                                'none' => 'لا شيء',
                                                'slider' => 'سلايدر',
                                                'title_bar' => 'شريط العنوان',
                                            ])
                                            ->required()
                                            ->default('none')
                                            ->live(),

                                        Select::make('settings.slider_id')
                                            ->label('اختر السلايدر')
                                            ->placeholder('اختر سلايدر')
                                            ->options([
                                                'slider-1' => 'Slider 1 - Centered',
                                                'slider-2' => 'Slider 2 - Left Aligned',
                                            ])
                                            ->default('slider-1')
                                            ->hidden(fn ($get) => $get('settings.header_area_type') !== 'slider'),

                                        TextInput::make('settings.title_bar_title')
                                            ->label('عنوان شريط العنوان')
                                            ->hidden(fn ($get) => $get('settings.header_area_type') !== 'title_bar'),

                                        Toggle::make('settings.show_breadcrumbs')
                                            ->label('إظهار مسار التنقل')
                                            ->default(true)
                                            ->hidden(fn ($get) => $get('settings.header_area_type') !== 'title_bar'),

                                        FileUpload::make('settings.title_bar_bg_image')
                                            ->label('صورة خلفية شريط العنوان')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images/title-bars')
                                            ->required(fn ($get) => $get('settings.header_area_type') === 'title_bar')
                                            ->hidden(fn ($get) => $get('settings.header_area_type') !== 'title_bar'),

                                        Select::make('settings.footer_style')
                                            ->label('نمط الفوتر')
                                            ->options([
                                                2 => 'Footer Style 2',
                                                3 => 'Footer Style 3',
                                                8 => 'Footer Style 8',
                                            ])
                                            ->required()
                                            ->default(2),

                                        Select::make('settings.footer_bg_color')
                                            ->label('لون خلفية الفوتر')
                                            ->options([
                                                'secondary' => 'Secondary',
                                                'light' => 'Light',
                                                'dark' => 'Dark',
                                            ])
                                            ->required()
                                            ->default('secondary'),

                                        Select::make('settings.container_type')
                                            ->label('نوع الحاوية')
                                            ->options([
                                                'container' => 'Container',
                                                'container-fluid' => 'Container Fluid',
                                            ])
                                            ->default('container'),

                                        Toggle::make('settings.show_sidebar')
                                            ->label('إظهار الشريط الجانبي')
                                            ->default(false)
                                            ->live(),

                                        Select::make('settings.sidebar_position')
                                            ->label('موضع الشريط الجانبي')
                                            ->options([
                                                'left' => 'يسار',
                                                'right' => 'يمين',
                                            ])
                                            ->default('right')
                                            ->hidden(fn ($get) => ! $get('settings.show_sidebar')),
                                    ]),

                                // إعدادات SEO
                                Fieldset::make('إعدادات SEO')
                                    ->schema([
                                        TextInput::make('seo.meta_title')
                                            ->label('عنوان Meta')
                                            ->maxLength(60),

                                        TextInput::make('seo.meta_keywords')
                                            ->label('الكلمات المفتاحية'),

                                        TextInput::make('seo.meta_description')
                                            ->label('وصف Meta')
                                            ->maxLength(160),

                                        FileUpload::make('seo.og_image')
                                            ->label('صورة Open Graph')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images/seo'),
                                    ]),
                            ])
                            ->columnSpan(3),
                    ]),
            ]);
    }

    protected static function getPageBuilderBlocks(): array
    {
        return [
            Block::make('hero')
                ->label('Hero')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('subtitle'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                    TextInput::make('button_text'),
                    TextInput::make('button_url'),
                ]),

            Block::make('slider')
                ->label('Slider')
                ->icon('heroicon-o-arrows-right-left')
                ->schema([
                    Repeater::make('slides')
                        ->schema([
                            FileUpload::make('icon')->image()->disk('public')->directory('blocks'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2),
                ]),

            Block::make('about')
                ->label('About')
                ->icon('heroicon-o-information-circle')
                ->schema([
                    TextInput::make('subtitle'),
                    TextInput::make('title')->required(),
                    RichEditor::make('content')->required(),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                    Repeater::make('features')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('text'),
                        ])
                        ->columns(2),
                ]),

            Block::make('services_grid')
                ->label('Services Grid')
                ->icon('heroicon-o-squares-2x2')
                ->schema([
                    TextInput::make('subtitle'),
                    TextInput::make('title'),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3),
                    Repeater::make('services')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2),
                ]),

            Block::make('services_slider')
                ->label('Services Slider')
                ->icon('heroicon-o-queue-list')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('services')
                        ->schema([
                            TextInput::make('title'),
                            Textarea::make('description'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ]),
                ]),

            Block::make('services')
                ->label('Services')
                ->icon('heroicon-o-briefcase')
                ->schema([
                    TextInput::make('title')->required(),
                    RichEditor::make('content'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                ]),

            Block::make('pricing_table')
                ->label('Pricing')
                ->icon('heroicon-o-currency-dollar')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('plans')
                        ->schema([
                            TextInput::make('name'),
                            TextInput::make('price'),
                            TextInput::make('period')->default('month'),
                            Repeater::make('features')
                                ->schema([
                                    TextInput::make('text'),
                                    Toggle::make('included')->default(true),
                                ])
                                ->columns(2),
                            TextInput::make('button_text')->default('Choose Plan'),
                            Toggle::make('featured')->default(false),
                        ])
                        ->columns(2),
                ]),

            Block::make('portfolio_grid')
                ->label('Portfolio')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title'),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3),
                    Toggle::make('sortable')->default(true),
                    Repeater::make('items')
                        ->schema([
                            TextInput::make('title'),
                            TextInput::make('category'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                            TextInput::make('link'),
                        ])
                        ->columns(2),
                ]),

            Block::make('testimonials')
                ->label('Testimonials')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->schema([
                    TextInput::make('title'),
                    Textarea::make('description'),
                    Repeater::make('testimonials')
                        ->schema([
                            TextInput::make('author_name'),
                            TextInput::make('author_position'),
                            TextInput::make('author_location'),
                            FileUpload::make('author_image')->image()->disk('public')->directory('blocks'),
                            Textarea::make('content'),
                            Select::make('rating')->options([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'])->default(5),
                        ])
                        ->columns(2),
                ]),

            Block::make('process')
                ->label('Process')
                ->icon('heroicon-o-arrow-path')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('steps')
                        ->schema([
                            TextInput::make('number'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                            TextInput::make('icon'),
                        ])
                        ->columns(2),
                ]),

            Block::make('history_timeline')
                ->label('Timeline')
                ->icon('heroicon-o-clock')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('events')
                        ->schema([
                            TextInput::make('year'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2),
                ]),

            Block::make('features_grid')
                ->label('Features Grid')
                ->icon('heroicon-o-star')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('features')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2),
                ]),

            Block::make('features_slider')
                ->label('Features Slider')
                ->icon('heroicon-o-star')
                ->schema([
                    TextInput::make('title'),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(4),
                    Repeater::make('features')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ]),
                ]),

            Block::make('icon_box')
                ->label('Icon Box')
                ->icon('heroicon-o-cube')
                ->schema([
                    TextInput::make('title'),
                    Textarea::make('description'),
                    TextInput::make('icon'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                ]),

            Block::make('accordion')
                ->label('Accordion')
                ->icon('heroicon-o-bars-3-bottom-right')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('items')
                        ->schema([
                            TextInput::make('question'),
                            RichEditor::make('answer'),
                        ])
                        ->columns(1),
                ]),

            Block::make('tabs')
                ->label('Tabs')
                ->icon('heroicon-o-folder-open')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('tabs')
                        ->schema([
                            TextInput::make('label'),
                            RichEditor::make('content'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ]),
                ]),

            Block::make('team')
                ->label('Team')
                ->icon('heroicon-o-user-group')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('members')
                        ->schema([
                            TextInput::make('name'),
                            TextInput::make('position'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                            TextInput::make('email'),
                            TextInput::make('phone'),
                            Repeater::make('social_links')
                                ->schema([
                                    Select::make('platform')->options([
                                        'facebook' => 'Facebook',
                                        'twitter' => 'Twitter',
                                        'linkedin' => 'LinkedIn',
                                        'instagram' => 'Instagram',
                                    ]),
                                    TextInput::make('url'),
                                ])
                                ->columns(2),
                        ])
                        ->columns(2),
                ]),

            Block::make('awards')
                ->label('Awards')
                ->icon('heroicon-o-trophy')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('awards')
                        ->schema([
                            TextInput::make('title'),
                            TextInput::make('year'),
                            Textarea::make('description'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2),
                ]),

            Block::make('clients_logos')
                ->label('Clients')
                ->icon('heroicon-o-building-office-2')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('clients')
                        ->schema([
                            TextInput::make('name'),
                            FileUpload::make('logo')->image()->disk('public')->directory('blocks'),
                            TextInput::make('url'),
                        ])
                        ->columns(2),
                ]),

            Block::make('before_after')
                ->label('Before/After')
                ->icon('heroicon-o-arrows-right-left')
                ->schema([
                    TextInput::make('title'),
                    FileUpload::make('before_image')->image()->disk('public')->directory('blocks')->required(),
                    FileUpload::make('after_image')->image()->disk('public')->directory('blocks')->required(),
                    Textarea::make('description'),
                ]),

            Block::make('text')
                ->label('Text')
                ->icon('heroicon-o-document-text')
                ->schema([
                    RichEditor::make('content')->required(),
                ]),

            Block::make('image')
                ->label('Image')
                ->icon('heroicon-o-photo')
                ->schema([
                    FileUpload::make('image')->image()->disk('public')->directory('blocks')->required(),
                    TextInput::make('caption'),
                    TextInput::make('alt'),
                ]),

            Block::make('archive_grid')
                ->label('Archive')
                ->icon('heroicon-o-bars-3')
                ->schema([
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3),
                    TextInput::make('per_page')->numeric()->default(12),
                ]),
        ];
    }
}

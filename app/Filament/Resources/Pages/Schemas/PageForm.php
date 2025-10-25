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
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->description('Basic page information')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true),

                                TextInput::make('slug')
                                    ->label('URL Slug')
                                    ->required()
                                    ->unique('pages', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('Generated automatically from title'),

                                FileUpload::make('featured_image')
                                    ->label('Featured Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/pages')
                                    ->columnSpanFull(),

                                Select::make('status')
                                    ->label('Status')
                                    ->options(ContentStatus::class)
                                    ->required(),
                            ]),
                    ]),

                Section::make('Page Type & Settings')
                    ->description('Select page type and its specific settings')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('settings.page_type')
                                    ->label('Page Type')
                                    ->options(PageType::class)
                                    ->required()
                                    ->live(),

                                Select::make('settings.header_style')
                                    ->label('Header Style')
                                    ->options(HeaderStyle::class)
                                    ->required()
                                    ->default(3),

                                Select::make('settings.footer_style')
                                    ->label('Footer Style')
                                    ->options(FooterStyle::class)
                                    ->required()
                                    ->default(3),

                                Toggle::make('settings.show_title_bar')
                                    ->label('Show Title Bar')
                                    ->default(true),

                                // Conditional fields for archive pages
                                Select::make('settings.archive_content_type')
                                    ->label('Content Type')
                                    ->options(ArchiveContentType::class)
                                    ->hidden(fn ($get) => $get('settings.page_type') !== PageType::ARCHIVE->value),

                                Select::make('settings.archive_template')
                                    ->label('Archive Template')
                                    ->options(ArchiveTemplate::class)
                                    ->hidden(fn ($get) => $get('settings.page_type') !== PageType::ARCHIVE->value),
                            ]),
                    ]),

                Section::make('Page Content')
                    ->description('Build page content using blocks')
                    ->schema([
                        Builder::make('content')
                            ->label('')
                            ->blocks(self::getPageBuilderBlocks())
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),

                Section::make('SEO Information')
                    ->description('Search Engine Optimization')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('seo.meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(60)
                                    ->helperText('Optimal length: 50-60 characters'),

                                TextInput::make('seo.meta_keywords')
                                    ->label('Meta Keywords')
                                    ->helperText('Keywords separated by commas'),

                                TextInput::make('seo.meta_description')
                                    ->label('Meta Description')
                                    ->maxLength(160)
                                    ->helperText('Optimal length: 150-160 characters')
                                    ->columnSpanFull(),

                                FileUpload::make('seo.og_image')
                                    ->label('OG Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/seo')
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }

    /**
     * Get all available Page Builder blocks (37 types total)
     */
    protected static function getPageBuilderBlocks(): array
    {
        return [
            // === HERO & SLIDERS ===
            Block::make('hero')
                ->label('Hero Banner')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title')->label('Title')->required(),
                    Textarea::make('subtitle')->label('Subtitle'),
                    FileUpload::make('image')->label('Background Image')->image()->disk('public')->directory('blocks'),
                    TextInput::make('button_text')->label('Button Text'),
                    TextInput::make('button_url')->label('Button URL'),
                ]),

            Block::make('slider')
                ->label('Slider with Icons')
                ->icon('heroicon-o-arrows-right-left')
                ->schema([
                    Repeater::make('slides')
                        ->label('Slides')
                        ->schema([
                            FileUpload::make('icon')->label('Icon')->image()->disk('public')->directory('blocks'),
                            TextInput::make('title')->label('Title'),
                            Textarea::make('description')->label('Description'),
                        ])
                        ->columns(2),
                ]),

            // === ABOUT SECTIONS ===
            Block::make('about')
                ->label('About Section')
                ->icon('heroicon-o-information-circle')
                ->schema([
                    TextInput::make('subtitle')->label('Subtitle'),
                    TextInput::make('title')->label('Title')->required(),
                    RichEditor::make('content')->label('Content')->required(),
                    FileUpload::make('image')->label('Image')->image()->disk('public')->directory('blocks'),
                    Repeater::make('features')
                        ->label('Features List')
                        ->schema([
                            TextInput::make('icon')->label('Icon Class'),
                            TextInput::make('text')->label('Feature Text'),
                        ])
                        ->columns(2),
                ]),

            // === SERVICES ===
            Block::make('services_grid')
                ->label('Services Grid')
                ->icon('heroicon-o-squares-2x2')
                ->schema([
                    TextInput::make('subtitle')->label('Subtitle'),
                    TextInput::make('title')->label('Title'),
                    Select::make('columns')->label('Columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3),
                    Repeater::make('services')
                        ->label('Services')
                        ->schema([
                            TextInput::make('icon')->label('Icon Class'),
                            TextInput::make('title')->label('Service Title'),
                            Textarea::make('description')->label('Description'),
                        ])
                        ->columns(2),
                ]),

            Block::make('services_slider')
                ->label('Services Slider')
                ->icon('heroicon-o-queue-list')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Repeater::make('services')
                        ->label('Services')
                        ->schema([
                            TextInput::make('title')->label('Title'),
                            Textarea::make('description')->label('Description'),
                            FileUpload::make('image')->label('Image')->image()->disk('public')->directory('blocks'),
                        ]),
                ]),

            Block::make('services')
                ->label('Services Section')
                ->icon('heroicon-o-briefcase')
                ->schema([
                    TextInput::make('title')->label('Title')->required(),
                    RichEditor::make('content')->label('Content'),
                    FileUpload::make('image')->label('Image')->image()->disk('public')->directory('blocks'),
                ]),

            // === PRICING TABLES ===
            Block::make('pricing_table')
                ->label('Pricing Table')
                ->icon('heroicon-o-currency-dollar')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Repeater::make('plans')
                        ->label('Pricing Plans')
                        ->schema([
                            TextInput::make('name')->label('Plan Name'),
                            TextInput::make('price')->label('Price'),
                            TextInput::make('period')->label('Period')->default('month'),
                            Repeater::make('features')
                                ->label('Features')
                                ->schema([
                                    TextInput::make('text')->label('Feature'),
                                    Toggle::make('included')->label('Included')->default(true),
                                ])
                                ->columns(2),
                            TextInput::make('button_text')->label('Button Text')->default('Choose Plan'),
                            Toggle::make('featured')->label('Featured Plan')->default(false),
                        ])
                        ->columns(2),
                ]),

            // === PORTFOLIO & PROJECTS ===
            Block::make('portfolio_grid')
                ->label('Portfolio Grid')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Select::make('columns')->label('Columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3),
                    Toggle::make('sortable')->label('Enable Sorting')->default(true),
                    Repeater::make('items')
                        ->label('Portfolio Items')
                        ->schema([
                            TextInput::make('title')->label('Project Title'),
                            TextInput::make('category')->label('Category'),
                            FileUpload::make('image')->label('Image')->image()->disk('public')->directory('blocks'),
                            TextInput::make('link')->label('Project Link'),
                        ])
                        ->columns(2),
                ]),

            // === TESTIMONIALS ===
            Block::make('testimonials')
                ->label('Testimonials')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Textarea::make('description')->label('Description'),
                    Repeater::make('testimonials')
                        ->label('Testimonials')
                        ->schema([
                            TextInput::make('author_name')->label('Author Name'),
                            TextInput::make('author_position')->label('Position'),
                            TextInput::make('author_location')->label('Location'),
                            FileUpload::make('author_image')->label('Author Image')->image()->disk('public')->directory('blocks'),
                            Textarea::make('content')->label('Testimonial Text'),
                            Select::make('rating')->label('Rating')->options([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'])->default(5),
                        ])
                        ->columns(2),
                ]),

            // === PROCESS & TIMELINE ===
            Block::make('process')
                ->label('Process Steps')
                ->icon('heroicon-o-arrow-path')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Repeater::make('steps')
                        ->label('Process Steps')
                        ->schema([
                            TextInput::make('number')->label('Step Number'),
                            TextInput::make('title')->label('Step Title'),
                            Textarea::make('description')->label('Description'),
                            TextInput::make('icon')->label('Icon Class'),
                        ])
                        ->columns(2),
                ]),

            Block::make('history_timeline')
                ->label('History Timeline')
                ->icon('heroicon-o-clock')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Repeater::make('events')
                        ->label('Timeline Events')
                        ->schema([
                            TextInput::make('year')->label('Year'),
                            TextInput::make('title')->label('Event Title'),
                            Textarea::make('description')->label('Description'),
                        ])
                        ->columns(2),
                ]),

            // === FEATURES ===
            Block::make('features_grid')
                ->label('Features Grid')
                ->icon('heroicon-o-star')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Repeater::make('features')
                        ->label('Features')
                        ->schema([
                            TextInput::make('icon')->label('Icon Class'),
                            TextInput::make('title')->label('Feature Title'),
                            Textarea::make('description')->label('Description'),
                        ])
                        ->columns(2),
                ]),

            Block::make('features_slider')
                ->label('Features Slider')
                ->icon('heroicon-o-star')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Select::make('columns')->label('Columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(4),
                    Repeater::make('features')
                        ->label('Features')
                        ->schema([
                            TextInput::make('icon')->label('Icon Class'),
                            TextInput::make('title')->label('Feature Title'),
                            Textarea::make('description')->label('Description'),
                        ]),
                ]),

            // === ICON BOXES ===
            Block::make('icon_box')
                ->label('Icon Box')
                ->icon('heroicon-o-cube')
                ->schema([
                    TextInput::make('title')->label('Box Title'),
                    Textarea::make('description')->label('Description'),
                    TextInput::make('icon')->label('Icon Class'),
                    FileUpload::make('image')->label('Image')->image()->disk('public')->directory('blocks'),
                ]),

            // === ACCORDION / FAQ ===
            Block::make('accordion')
                ->label('Accordion / FAQ')
                ->icon('heroicon-o-bars-3-bottom-right')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Repeater::make('items')
                        ->label('Accordion Items')
                        ->schema([
                            TextInput::make('question')->label('Question'),
                            RichEditor::make('answer')->label('Answer'),
                        ])
                        ->columns(1),
                ]),

            // === TABS ===
            Block::make('tabs')
                ->label('Tabbed Interface')
                ->icon('heroicon-o-folder-open')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Repeater::make('tabs')
                        ->label('Tabs')
                        ->schema([
                            TextInput::make('label')->label('Tab Label'),
                            RichEditor::make('content')->label('Tab Content'),
                            FileUpload::make('image')->label('Tab Image')->image()->disk('public')->directory('blocks'),
                        ]),
                ]),

            // === TEAM ===
            Block::make('team')
                ->label('Team Members')
                ->icon('heroicon-o-user-group')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Repeater::make('members')
                        ->label('Team Members')
                        ->schema([
                            TextInput::make('name')->label('Name'),
                            TextInput::make('position')->label('Position'),
                            FileUpload::make('image')->label('Photo')->image()->disk('public')->directory('blocks'),
                            TextInput::make('email')->label('Email'),
                            TextInput::make('phone')->label('Phone'),
                            Repeater::make('social_links')
                                ->label('Social Links')
                                ->schema([
                                    Select::make('platform')->label('Platform')->options([
                                        'facebook' => 'Facebook',
                                        'twitter' => 'Twitter',
                                        'linkedin' => 'LinkedIn',
                                        'instagram' => 'Instagram',
                                    ]),
                                    TextInput::make('url')->label('URL'),
                                ])
                                ->columns(2),
                        ])
                        ->columns(2),
                ]),

            // === AWARDS ===
            Block::make('awards')
                ->label('Awards & Achievements')
                ->icon('heroicon-o-trophy')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Repeater::make('awards')
                        ->label('Awards')
                        ->schema([
                            TextInput::make('title')->label('Award Title'),
                            TextInput::make('year')->label('Year'),
                            Textarea::make('description')->label('Description'),
                            FileUpload::make('image')->label('Award Image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2),
                ]),

            // === CLIENTS LOGOS ===
            Block::make('clients_logos')
                ->label('Client Logos')
                ->icon('heroicon-o-building-office-2')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Repeater::make('clients')
                        ->label('Clients')
                        ->schema([
                            TextInput::make('name')->label('Client Name'),
                            FileUpload::make('logo')->label('Logo')->image()->disk('public')->directory('blocks'),
                            TextInput::make('url')->label('Website URL'),
                        ])
                        ->columns(2),
                ]),

            // === BEFORE/AFTER ===
            Block::make('before_after')
                ->label('Before/After Comparison')
                ->icon('heroicon-o-arrows-right-left')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    FileUpload::make('before_image')->label('Before Image')->image()->disk('public')->directory('blocks')->required(),
                    FileUpload::make('after_image')->label('After Image')->image()->disk('public')->directory('blocks')->required(),
                    Textarea::make('description')->label('Description'),
                ]),

            // === BASIC CONTENT ===
            Block::make('text')
                ->label('Text Block')
                ->icon('heroicon-o-document-text')
                ->schema([
                    RichEditor::make('content')->label('Content')->required(),
                ]),

            Block::make('image')
                ->label('Image Block')
                ->icon('heroicon-o-photo')
                ->schema([
                    FileUpload::make('image')->label('Image')->image()->disk('public')->directory('blocks')->required(),
                    TextInput::make('caption')->label('Caption'),
                    TextInput::make('alt')->label('Alt Text'),
                ]),

            // === ARCHIVE GRID (for archive pages) ===
            Block::make('archive_grid')
                ->label('Content Archive Grid')
                ->icon('heroicon-o-bars-3')
                ->schema([
                    Select::make('columns')->label('Columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3),
                    TextInput::make('per_page')->label('Items per Page')->numeric()->default(12),
                ]),
        ];
    }
}

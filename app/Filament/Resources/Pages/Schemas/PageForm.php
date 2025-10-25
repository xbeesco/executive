<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Enums\ArchiveContentType;
use App\Enums\ArchiveTemplate;
use App\Enums\ContentStatus;
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
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Flex::make([
                    Section::make()
                        ->schema([
                            Builder::make('content')
                                ->blocks(self::getPageBuilderBlocks())
                                ->collapsible(),
                        ]),

                    Section::make()
                        ->schema([
                            TextInput::make('title')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true),

                            TextInput::make('slug')
                                ->required()
                                ->unique('pages', 'slug', ignoreRecord: true)
                                ->maxLength(255),

                            FileUpload::make('featured_image')
                                ->image()
                                ->disk('public')
                                ->directory('images/pages'),

                            Select::make('status')
                                ->options(ContentStatus::class)
                                ->required(),

                            Select::make('settings.header_style')
                                ->label('Header Style')
                                ->options([
                                    3 => 'Header Style 3',
                                    4 => 'Header Style 4',
                                    8 => 'Header Style 8',
                                ])
                                ->required()
                                ->default(3),

                            Select::make('settings.header_area_type')
                                ->label('Header Area Type')
                                ->options([
                                    'none' => 'None',
                                    'slider' => 'Slider',
                                    'title_bar' => 'Title Bar',
                                ])
                                ->required()
                                ->default('none')
                                ->live(),

                            Select::make('settings.slider_id')
                                ->label('Select Slider')
                                ->placeholder('Choose a slider')
                                ->hidden(fn ($get) => $get('settings.header_area_type') !== 'slider'),

                            TextInput::make('settings.title_bar_title')
                                ->label('Title Bar Title')
                                ->hidden(fn ($get) => $get('settings.header_area_type') !== 'title_bar'),

                            Toggle::make('settings.show_breadcrumbs')
                                ->label('Show Breadcrumbs')
                                ->default(true)
                                ->hidden(fn ($get) => $get('settings.header_area_type') !== 'title_bar'),

                            FileUpload::make('settings.title_bar_bg_image')
                                ->label('Title Bar Background Image')
                                ->image()
                                ->disk('public')
                                ->directory('images/title-bars')
                                ->required(fn ($get) => $get('settings.header_area_type') === 'title_bar')
                                ->hidden(fn ($get) => $get('settings.header_area_type') !== 'title_bar'),

                            Select::make('settings.footer_style')
                                ->label('Footer Style')
                                ->options([
                                    2 => 'Footer Style 2',
                                    3 => 'Footer Style 3',
                                    8 => 'Footer Style 8',
                                ])
                                ->required()
                                ->default(2),

                            Select::make('settings.footer_bg_color')
                                ->label('Footer Background Color')
                                ->options([
                                    'secondary' => 'Secondary',
                                    'light' => 'Light',
                                    'dark' => 'Dark',
                                ])
                                ->required()
                                ->default('secondary'),

                            Select::make('settings.container_type')
                                ->label('Container Type')
                                ->options([
                                    'container' => 'Container',
                                    'container-fluid' => 'Container Fluid',
                                ])
                                ->default('container'),

                            Toggle::make('settings.show_sidebar')
                                ->label('Show Sidebar')
                                ->default(false)
                                ->live(),

                            Select::make('settings.sidebar_position')
                                ->label('Sidebar Position')
                                ->options([
                                    'left' => 'Left',
                                    'right' => 'Right',
                                ])
                                ->default('right')
                                ->hidden(fn ($get) => ! $get('settings.show_sidebar')),

                            Select::make('settings.page_type')
                                ->options(PageType::class)
                                ->required()
                                ->live(),

                            Select::make('settings.archive_content_type')
                                ->options(ArchiveContentType::class)
                                ->hidden(fn ($get) => $get('settings.page_type') !== PageType::ARCHIVE->value),

                            Select::make('settings.archive_template')
                                ->options(ArchiveTemplate::class)
                                ->hidden(fn ($get) => $get('settings.page_type') !== PageType::ARCHIVE->value),

                            TextInput::make('seo.meta_title')
                                ->maxLength(60),

                            TextInput::make('seo.meta_keywords'),

                            TextInput::make('seo.meta_description')
                                ->maxLength(160),

                            FileUpload::make('seo.og_image')
                                ->image()
                                ->disk('public')
                                ->directory('images/seo'),
                        ])
                        ->grow(false),
                ])->from('md'),
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

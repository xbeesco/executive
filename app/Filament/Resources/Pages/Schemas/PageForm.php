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
use Filament\Forms\Components\Select;
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
                            ->blocks([
                                Block::make('hero')
                                    ->label('Hero Section')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Title')
                                            ->required(),

                                        TextInput::make('subtitle')
                                            ->label('Subtitle'),

                                        FileUpload::make('image')
                                            ->label('Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images/blocks'),
                                    ]),

                                Block::make('text')
                                    ->label('Text')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        TextInput::make('text')
                                            ->label('Content')
                                            ->required(),
                                    ]),

                                Block::make('image')
                                    ->label('Image')
                                    ->icon('heroicon-o-photo')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label('Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images/blocks')
                                            ->required(),

                                        TextInput::make('caption')
                                            ->label('Caption'),
                                    ]),

                                Block::make('services_grid')
                                    ->label('Services Grid')
                                    ->icon('heroicon-o-squares-2x2')
                                    ->schema([
                                        Select::make('columns')
                                            ->label('Number of Columns')
                                            ->options([
                                                2 => '2',
                                                3 => '3',
                                                4 => '4',
                                            ])
                                            ->default(3),
                                    ]),

                                Block::make('archive_grid')
                                    ->label('Content Grid')
                                    ->icon('heroicon-o-bars-3')
                                    ->schema([
                                        Select::make('columns')
                                            ->label('Number of Columns')
                                            ->options([
                                                2 => '2',
                                                3 => '3',
                                                4 => '4',
                                            ])
                                            ->default(3),

                                        TextInput::make('per_page')
                                            ->label('Items per Page')
                                            ->numeric()
                                            ->default(12),
                                    ]),
                            ])
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
}

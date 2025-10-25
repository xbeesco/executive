<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Enums\ArchiveContentType;
use App\Enums\ArchiveTemplate;
use App\Enums\ContentStatus;
use App\Enums\FooterStyle;
use App\Enums\HeaderStyle;
use App\Enums\PageType;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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
                    Section::make('Page Content')
                        ->description('Build your page using pre-made sections or custom blocks')
                        ->schema([
                            Builder::make('content')
                                ->label('')
                                ->blocks(PageBuilderBlocks::get())
                                ->collapsible()
                                ->columnSpanFull(),
                        ]),

                    Section::make('Page Settings')
                        ->description('Configure page metadata and display options')
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

                            Select::make('settings.archive_content_type')
                                ->label('Archive Content Type')
                                ->options(ArchiveContentType::class)
                                ->hidden(fn ($get) => $get('settings.page_type') !== PageType::ARCHIVE->value),

                            Select::make('settings.archive_template')
                                ->label('Archive Template')
                                ->options(ArchiveTemplate::class)
                                ->hidden(fn ($get) => $get('settings.page_type') !== PageType::ARCHIVE->value),
                        ])
                        ->grow(false),

                    Section::make('SEO Settings')
                        ->description('Optimize page for search engines')
                        ->schema([
                            TextInput::make('seo.meta_title')
                                ->label('Meta Title')
                                ->maxLength(60)
                                ->helperText('Recommended: 50-60 characters'),

                            TextInput::make('seo.meta_keywords')
                                ->label('Meta Keywords')
                                ->helperText('Comma-separated keywords'),

                            TextInput::make('seo.meta_description')
                                ->label('Meta Description')
                                ->maxLength(160)
                                ->helperText('Recommended: 150-160 characters'),

                            FileUpload::make('seo.og_image')
                                ->label('Open Graph Image')
                                ->image()
                                ->disk('public')
                                ->directory('images/seo')
                                ->helperText('Recommended: 1200x630px'),
                        ])
                        ->collapsed()
                        ->grow(false),
                ])->from('md'),
            ]);
    }
}

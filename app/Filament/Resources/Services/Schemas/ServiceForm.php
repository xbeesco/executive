<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Enums\ContentStatus;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 8 Columns
                Section::make('Service Content')
                    ->description('Build service content using blocks')
                    ->schema([
                        Builder::make('content')
                            ->label('')
                            ->blocks([
                                Block::make('text')
                                    ->label('Text Block')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        Textarea::make('text')
                                            ->label('Content')
                                            ->required()
                                            ->rows(5),
                                    ]),

                                Block::make('image')
                                    ->label('Image Block')
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

                                Block::make('quote')
                                    ->label('Quote Block')
                                    ->icon('heroicon-o-chat-bubble-left-right')
                                    ->schema([
                                        Textarea::make('text')
                                            ->label('Quote Text')
                                            ->required()
                                            ->rows(3),

                                        TextInput::make('author')
                                            ->label('Author'),
                                    ]),
                            ])
                            ->collapsible(),
                    ])
                    ->columnSpan(8),

                // Sidebar Section - 4 Columns
                Section::make('Service Settings')
                    ->schema([
                        // Basic Information
                        Fieldset::make('Basic Information')
                            ->columns(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->columnSpan(2),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->unique('services', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('Auto-generated from title')
                                    ->columnSpan(2),

                                Textarea::make('excerpt')
                                    ->label('Excerpt')
                                    ->rows(3)
                                    ->maxLength(500)
                                    ->helperText('Brief service description')
                                    ->columnSpan(2),

                                TextInput::make('icon')
                                    ->label('Icon')
                                    ->placeholder('fas fa-rocket')
                                    ->helperText('Font Awesome icon class'),

                                Select::make('status')
                                    ->label('Status')
                                    ->options(ContentStatus::class)
                                    ->required()
                                    ->selectablePlaceholder(false)
                                    ->default(ContentStatus::DRAFT->value),

                                FileUpload::make('featured_image')
                                    ->label('Featured Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/services')
                                    ->columnSpan(2),
                            ]),

                        // Service Features
                        Fieldset::make('Service Features')
                            ->schema([
                                Repeater::make('features')
                                    ->label('')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Feature Name')
                                            ->required(),

                                        TextInput::make('icon')
                                            ->label('Icon')
                                            ->default('fas fa-check')
                                            ->placeholder('fas fa-check'),
                                    ])
                                    ->addActionLabel('Add Feature')
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Feature'),
                            ]),

                        // SEO Settings
                        Fieldset::make('SEO Settings')
                            ->columns(2)
                            ->schema([
                                TextInput::make('seo.meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(60)
                                    ->helperText('Optimal: 50-60 characters')
                                    ->columnSpan(2),

                                TextInput::make('seo.meta_keywords')
                                    ->label('Meta Keywords')
                                    ->helperText('Comma separated keywords')
                                    ->columnSpan(2),

                                Textarea::make('seo.meta_description')
                                    ->label('Meta Description')
                                    ->rows(2)
                                    ->maxLength(160)
                                    ->helperText('Optimal: 150-160 characters')
                                    ->columnSpan(2),

                                FileUpload::make('seo.og_image')
                                    ->label('Open Graph Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/seo')
                                    ->columnSpan(2),
                            ]),
                    ])
                    ->columnSpan(4),
            ]);
    }
}

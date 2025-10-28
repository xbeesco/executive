<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Enums\ContentStatus;
use App\Filament\Resources\Schemas\ContentBlocksSchema;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 8 Columns
                Section::make('Post Content')
                    ->schema([
                        Builder::make('content')
                            ->label('Post Content Builder')
                            ->blocks(ContentBlocksSchema::getContentBlocks())
                            ->collapsible()
                            ->blockNumbers(false)
                            ->helperText('Use content blocks to build your post. These blocks render without section wrappers.'),
                    ])
                    ->columnSpan(8),

                // Sidebar Section - 4 Columns
                Section::make('Post Settings')
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
                                    ->unique('posts', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->columnSpan(2),

                                Textarea::make('excerpt')
                                    ->label('Excerpt')
                                    ->rows(3)
                                    ->maxLength(500)
                                    ->columnSpan(2),

                                Select::make('status')
                                    ->label('Status')
                                    ->options(ContentStatus::class)
                                    ->required()
                                    ->selectablePlaceholder(false),

                                DateTimePicker::make('published_at')
                                    ->label('Publish Date')
                                    ->native(false),

                                FileUpload::make('featured_image')
                                    ->label('Featured Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/posts')
                                    ->columnSpan(2),
                            ]),

                        // Author & Categories
                        Fieldset::make('Classification')
                            ->schema([
                                Select::make('author_id')
                                    ->label('Author')
                                    ->relationship('author', 'name')
                                    ->searchable()
                                    ->required(),

                                Select::make('categories')
                                    ->label('Categories')
                                    ->relationship('categories', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload(),

                                Select::make('tags')
                                    ->label('Tags')
                                    ->relationship('tags', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->label('Tag Name')
                                            ->required(),
                                    ]),
                            ]),

                        // SEO Settings
                        Fieldset::make('SEO Settings')
                            ->columns(2)
                            ->schema([
                                TextInput::make('seo.meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(60)
                                    ->columnSpan(2),

                                TextInput::make('seo.meta_keywords')
                                    ->label('Meta Keywords')
                                    ->columnSpan(2),

                                Textarea::make('seo.meta_description')
                                    ->label('Meta Description')
                                    ->rows(2)
                                    ->maxLength(160)
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

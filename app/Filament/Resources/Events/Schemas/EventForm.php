<?php

namespace App\Filament\Resources\Events\Schemas;

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

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 8 Columns
                Section::make('Event Content')
                    ->description('Build event content using blocks')
                    ->schema([
                        Builder::make('content')
                            ->label('Event Content Builder')
                            ->blocks(ContentBlocksSchema::getContentBlocks())
                            ->collapsible()
                            ->blockNumbers(false)
                            ->helperText('Use content blocks to build your event details. These blocks render without section wrappers.'),
                    ])
                    ->columnSpan(8),

                // Sidebar Section - 4 Columns
                Section::make('Event Settings')
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
                                    ->unique('events', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('Auto-generated from title')
                                    ->columnSpan(2),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(3)
                                    ->helperText('Brief event description')
                                    ->columnSpan(2),

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
                                    ->directory('images/events')
                                    ->columnSpan(2),
                            ]),

                        // Date & Location
                        Fieldset::make('Date & Location')
                            ->columns(2)
                            ->schema([
                                DateTimePicker::make('start_date')
                                    ->label('Start Date')
                                    ->required()
                                    ->native(false),

                                DateTimePicker::make('end_date')
                                    ->label('End Date')
                                    ->native(false)
                                    ->after('start_date'),

                                TextInput::make('location')
                                    ->label('Location')
                                    ->maxLength(255)
                                    ->placeholder('Cairo, Egypt'),

                                TextInput::make('max_attendees')
                                    ->label('Max Attendees')
                                    ->numeric()
                                    ->minValue(1)
                                    ->placeholder('100'),
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

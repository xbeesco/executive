<?php

namespace App\Services\Schemas;

use App\Services\Icons\FlaticonList;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;

class ContentBuilderSchema
{
    /**
     * Get all unified content blocks for pages, posts, events, and services
     */
    public static function getBlocks(): array
    {
        return [
            // === BASIC CONTENT BLOCKS ===

            Block::make('content_text')
                ->label('Text Content')
                ->icon('heroicon-o-document-text')
                ->columns(12)
                ->schema([
                    RichEditor::make('content')
                        ->label('Content')
                        ->required()
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                            ['h1', 'h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd', 'alignJustify'],
                            ['blockquote', 'codeBlock', 'code', 'details', 'bulletList', 'orderedList'],
                            ['textColor', 'highlight', 'horizontalRule', 'clearFormatting'],
                            ['undo', 'redo'],
                        ])
                        ->columnSpan(12),
                ]),

            Block::make('content_image')
                ->icon('heroicon-o-photo')
                ->label('Image')
                ->columns(12)
                ->schema([
                    FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->disk('public')
                        ->directory('images/content')
                        ->imageEditor()
                        ->required()
                        ->columnSpan(12),

                    TextInput::make('alt_text')
                        ->label('Alt Text')
                        ->maxLength(255)
                        ->columnSpan(12),

                    TextInput::make('caption')
                        ->label('Caption')
                        ->maxLength(255)
                        ->columnSpan(12),

                    Select::make('alignment')
                        ->label('Alignment')
                        ->options([
                            'text-start' => 'Left',
                            'text-center' => 'Center',
                            'text-end' => 'Right',
                        ])
                        ->default('text-center')
                        ->columnSpan(6),

                    Select::make('size')
                        ->label('Size')
                        ->options([
                            'w-100' => 'Full Width',
                            'w-75' => '75%',
                            'w-50' => '50%',
                            'w-25' => '25%',
                        ])
                        ->default('w-100')
                        ->columnSpan(6),
                ]),

            Block::make('content_gallery')
                ->label('Image Gallery')
                ->icon('heroicon-o-photo')
                ->columns(12)
                ->schema([
                    Repeater::make('images')
                        ->label('Images')
                        ->schema([
                            Grid::make(12)->schema([
                                FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/gallery')
                                    ->imageEditor()
                                    ->required()
                                    ->columnSpan(12),
                                TextInput::make('alt_text')
                                    ->label('Alt Text')
                                    ->columnSpan(6),
                                TextInput::make('caption')
                                    ->label('Caption')
                                    ->columnSpan(6),
                            ]),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['caption'] ?? 'Image')
                        ->columnSpan(12),
                    Select::make('columns')
                        ->label('Columns per Row')
                        ->options([
                            '12' => '1 Column',
                            '6' => '2 Columns',
                            '4' => '3 Columns',
                            '3' => '4 Columns',
                        ])
                        ->default('4')
                        ->columnSpan(12),
                ]),

            Block::make('content_list')
                ->label('List')
                ->icon('heroicon-o-list-bullet')
                ->columns(12)
                ->schema([
                    Select::make('list_type')
                        ->label('List Type')
                        ->options([
                            'unordered' => 'Bullet List',
                            'ordered' => 'Numbered List',
                        ])
                        ->default('unordered')
                        ->required()
                        ->columnSpan(6),
                    Select::make('list_style')
                        ->label('List Style')
                        ->options([
                            'default' => 'Default',
                            'unstyled' => 'No Markers',
                        ])
                        ->default('default')
                        ->columnSpan(6),
                    Repeater::make('items')
                        ->label('List Items')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('text')
                                    ->label('Item Text')
                                    ->required()
                                    ->columnSpan(9),
                                Select::make('icon')
                                    ->label('Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->columnSpan(3),
                            ]),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Item')
                        ->required()
                        ->minItems(1)
                        ->columnSpan(12),
                ]),

            Block::make('content_quote')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->label('Quote')
                ->columns(12)
                ->schema([
                    Textarea::make('quote')
                        ->label('Quote Text')
                        ->required()
                        ->rows(3)
                        ->columnSpan(12),

                    TextInput::make('author')
                        ->label('Author Name')
                        ->columnSpan(6),

                    TextInput::make('author_title')
                        ->label('Author Title/Position')
                        ->columnSpan(6),
                ]),

            Block::make('content_accordion')
                ->label('Accordion (Simple)')
                ->icon('heroicon-o-bars-3-bottom-left')
                ->columns(12)
                ->schema([
                    Repeater::make('items')
                        ->label('Accordion Items')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->columnSpan(9),
                                Select::make('icon')
                                    ->label('Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->columnSpan(3),
                                RichEditor::make('content')
                                    ->label('Content')
                                    ->required()
                                    ->toolbarButtons(['bold', 'bulletList', 'italic', 'link', 'orderedList'])
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Item')
                        ->required()
                        ->minItems(1)
                        ->columnSpan(12),
                ]),

            Block::make('content_video')
                ->icon('heroicon-o-video-camera')
                ->label('Video')
                ->columns(12)
                ->schema([
                    Select::make('video_type')
                        ->label('Video Type')
                        ->options([
                            'youtube' => 'YouTube',
                            'vimeo' => 'Vimeo',
                            'embed' => 'Direct Embed URL',
                        ])
                        ->default('youtube')
                        ->required()
                        ->reactive()
                        ->columnSpan(12),

                    TextInput::make('video_url')
                        ->label('Video URL')
                        ->url()
                        ->required()
                        ->helperText(function ($get) {
                            $type = $get('video_type');
                            if ($type === 'youtube') {
                                return 'Example: https://www.youtube.com/watch?v=VIDEO_ID';
                            } elseif ($type === 'vimeo') {
                                return 'Example: https://vimeo.com/VIDEO_ID';
                            }

                            return 'Direct embed URL (e.g., from iframe src)';
                        })
                        ->columnSpan(12),

                    TextInput::make('title')
                        ->label('Video Title')
                        ->columnSpan(6),

                    TextInput::make('caption')
                        ->label('Caption')
                        ->columnSpan(6),
                ]),

            Block::make('content_divider')
                ->icon('heroicon-o-minus')
                ->label('Divider')
                ->columns(12)
                ->schema([
                    Select::make('style')
                        ->label('Line Style')
                        ->options([
                            'solid' => 'Solid',
                            'dashed' => 'Dashed',
                            'dotted' => 'Dotted',
                        ])
                        ->default('solid')
                        ->columnSpan(6),

                    Select::make('color')
                        ->label('Color')
                        ->options([
                            'primary' => 'Primary',
                            'secondary' => 'Secondary',
                            'dark' => 'Dark',
                            'light' => 'Light',
                        ])
                        ->default('secondary')
                        ->columnSpan(6),

                    TextInput::make('thickness')
                        ->label('Thickness (px)')
                        ->numeric()
                        ->default(1)
                        ->minValue(1)
                        ->maxValue(10)
                        ->columnSpan(4),

                    TextInput::make('width')
                        ->label('Width (%)')
                        ->numeric()
                        ->default(100)
                        ->minValue(10)
                        ->maxValue(100)
                        ->columnSpan(4),

                    TextInput::make('opacity')
                        ->label('Opacity')
                        ->numeric()
                        ->default(25)
                        ->minValue(10)
                        ->maxValue(100)
                        ->columnSpan(4),

                    TextInput::make('text')
                        ->label('Text (Optional)')
                        ->helperText('Text to display in the middle of divider')
                        ->columnSpan(12),
                ]),

            Block::make('spacer')
                ->label('Spacer')
                ->icon('heroicon-o-arrows-up-down')
                ->columns(12)
                ->schema([
                    Select::make('size')
                        ->label('Spacer Size')
                        ->options([
                            'section-lgb' => 'Small',
                            'section-lgt' => 'Medium',
                            'section-lgx' => 'Large',
                        ])
                        ->default('section-lgt')
                        ->required()
                        ->selectablePlaceholder(false)
                        ->columnSpan(12),
                ]),

            // === PAGE SECTION BLOCKS ===

            Block::make('hero')
                ->label('Hero Section')
                ->icon('heroicon-o-photo')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->required()
                        ->placeholder('Transforming ordinary offices into distinguished executive environments')
                        ->columnSpan(12),

                    Textarea::make('description')
                        ->label('Description')
                        ->rows(3)
                        ->placeholder('Since 2025, Executive Workspace has been dedicated...')
                        ->columnSpan(12),

                    Repeater::make('accordion_items')
                        ->label('Accordion Items')
                        ->schema([
                            Grid::make(12)
                                ->schema([
                                    TextInput::make('number')
                                        ->label('Number')
                                        ->placeholder('01')
                                        ->columnSpan(3),

                                    TextInput::make('title')
                                        ->label('Title')
                                        ->required()
                                        ->placeholder('Innovation')
                                        ->columnSpan(9),

                                    Textarea::make('content')
                                        ->label('Content')
                                        ->required()
                                        ->rows(3)
                                        ->placeholder('From initial strategic planning...')
                                        ->columnSpan(12),
                                ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => ($state['number'] ?? '').($state['number'] && $state['title'] ? ' - ' : '').($state['title'] ?? 'Untitled'))
                        ->defaultItems(3)
                        ->minItems(1),
                ]),

            Block::make('slider')
                ->label('Slider')
                ->icon('heroicon-o-arrows-right-left')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Section Title (Optional)')
                        ->placeholder('Leave empty if not needed')
                        ->columnSpan(12),

                    Repeater::make('slides')
                        ->label('Slider Items')
                        ->schema([
                            Grid::make(12)
                                ->schema([
                                    Select::make('icon')
                                        ->label('Icon')
                                        ->options(FlaticonList::getSelectOptions())
                                        ->searchable()
                                        ->required()
                                        ->default('pbmit-xinterio-icon-tools')
                                        ->placeholder('Search and select an icon')
                                        ->columnSpan(12),

                                    TextInput::make('title')
                                        ->label('Title')
                                        ->required()
                                        ->columnSpan(12),

                                    Textarea::make('description')
                                        ->label('Description')
                                        ->rows(3)
                                        ->columnSpan(12),
                                ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Slide')
                        ->defaultItems(4)
                        ->minItems(1),
                ]),

            Block::make('about')
                ->label('About Section')
                ->icon('heroicon-o-information-circle')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->required()
                        ->columnSpan(6),

                    RichEditor::make('content')
                        ->label('Content')
                        ->columnSpan(12),

                    FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->columnSpan(12),

                    Repeater::make('features')
                        ->label('Features')
                        ->schema([
                            Grid::make(12)
                                ->schema([
                                    TextInput::make('text')
                                        ->label('Feature Text')
                                        ->required()
                                        ->columnSpan(12),
                                ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                        ->defaultItems(2),
                ]),

            Block::make('about_variation_2')
                ->label('About - Variation 2')
                ->icon('heroicon-o-information-circle')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')->columnSpan(6),
                    TextInput::make('title')->columnSpan(6),
                    RichEditor::make('content')->columnSpan(12),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks')->columnSpan(12),
                    Repeater::make('features')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->columnSpan(12),
                                TextInput::make('text')->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature'),
                ]),

            Block::make('about_variation_3')
                ->label('About - Variation 3')
                ->icon('heroicon-o-information-circle')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')->columnSpan(6),
                    TextInput::make('title')->columnSpan(6),
                    RichEditor::make('content')->columnSpan(12),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks')->columnSpan(12),
                    Repeater::make('list_items')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('text')->columnSpan(8),
                                Select::make('icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->columnSpan(4),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Item')
                        ->defaultItems(4),
                ]),

            Block::make('about_variation_4')
                ->label('About - Variation 4')
                ->icon('heroicon-o-information-circle')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')->columnSpan(6),
                    TextInput::make('title')->columnSpan(6),
                    RichEditor::make('content')->columnSpan(12),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks')->columnSpan(12),
                    Repeater::make('features')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->columnSpan(12),
                                TextInput::make('text')->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                        ->defaultItems(3),
                ]),

            Block::make('services_grid')
                ->label('Services Grid')
                ->icon('heroicon-o-squares-2x2')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')->columnSpan(6),
                    TextInput::make('title')->columnSpan(6),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3)->columnSpan(12),
                    Repeater::make('services')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')->options(FlaticonList::getSelectOptions())->searchable()->columnSpan(12),
                                TextInput::make('title')->columnSpan(12),
                                Textarea::make('description')->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)->collapsible()->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Service')->defaultItems(3),
                ]),

            Block::make('services_grid_variation_2')
                ->label('Services Grid - Variation 2')
                ->icon('heroicon-o-squares-2x2')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')->columnSpan(6),
                    TextInput::make('title')->columnSpan(6),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3)->columnSpan(12),
                    Repeater::make('services')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')->options(FlaticonList::getSelectOptions())->searchable()->columnSpan(12),
                                TextInput::make('title')->columnSpan(12),
                                Textarea::make('description')->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)->collapsible()->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Service')->defaultItems(3),
                ]),

            Block::make('services_grid_variation_3')
                ->label('Services Grid - Variation 3')
                ->icon('heroicon-o-squares-2x2')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')->columnSpan(6),
                    TextInput::make('title')->columnSpan(6),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3)->columnSpan(12),
                    Repeater::make('services')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')->options(FlaticonList::getSelectOptions())->searchable()->columnSpan(12),
                                TextInput::make('title')->columnSpan(12),
                                Textarea::make('description')->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)->collapsible()->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Service')->defaultItems(3),
                ]),

            Block::make('services_grid_variation_4')
                ->label('Services Grid - Variation 4')
                ->icon('heroicon-o-squares-2x2')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3)->columnSpan(12),
                    Repeater::make('services')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')->options(FlaticonList::getSelectOptions())->searchable()->columnSpan(12),
                                TextInput::make('title')->columnSpan(12),
                                Textarea::make('description')->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)->collapsible()->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Service')->defaultItems(3),
                ]),

            Block::make('services_slider')
                ->label('Services Slider')
                ->icon('heroicon-o-queue-list')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Section Title (Optional)')
                        ->columnSpan(12),
                    Repeater::make('services')
                        ->label('Services')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->columnSpan(12),
                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(3)
                                    ->columnSpan(12),
                                FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blocks')
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Service')
                        ->defaultItems(3)
                        ->minItems(1),
                ]),

            Block::make('services')
                ->label('Services Section')
                ->icon('heroicon-o-briefcase')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->columnSpan(6),
                    TextInput::make('title')
                        ->label('Title')
                        ->required()
                        ->columnSpan(6),
                    RichEditor::make('content')
                        ->label('Content')
                        ->columnSpan(12),
                    FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->columnSpan(12),
                    Repeater::make('features')
                        ->label('Features')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')
                                    ->label('Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->required()
                                    ->columnSpan(12),
                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->columnSpan(12),
                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(2)
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Feature')
                        ->defaultItems(6)
                        ->minItems(1),
                ]),

            Block::make('services_variation_2')
                ->label('Services - Variation 2')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    RichEditor::make('content')->columnSpan(12),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks')->columnSpan(12),
                ]),

            Block::make('services_variation_3')
                ->label('Services - Variation 3')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    RichEditor::make('content')->columnSpan(12),
                    Repeater::make('services')
                        ->schema([
                            Select::make('icon')
                                ->label('Icon')
                                ->options(FlaticonList::getSelectOptions())
                                ->searchable()
                                ->allowHtml()
                                ->placeholder('Select an icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2)
                        ->defaultItems(3)
                        ->columnSpan(12),
                ]),

            Block::make('pricing_table')
                ->label('Pricing Table')
                ->icon('heroicon-o-currency-dollar')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->label('Section Title')->columnSpan(12),
                    Repeater::make('plans')
                        ->label('Pricing Plans')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('name')->label('Plan Name')->required()->columnSpan(6),
                                TextInput::make('price')->label('Price')->required()->columnSpan(3),
                                TextInput::make('period')->label('Period')->default('month')->columnSpan(3),
                                Toggle::make('featured')->label('Featured Plan')->default(false)->columnSpan(12),
                                Repeater::make('features')
                                    ->label('Features')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            TextInput::make('text')->label('Feature')->required()->columnSpan(9),
                                            Toggle::make('included')->label('Included')->default(true)->columnSpan(3),
                                        ]),
                                    ])
                                    ->columnSpan(12)
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                                    ->defaultItems(5),
                                TextInput::make('button_text')->label('Button Text')->default('Choose Plan')->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Plan')
                        ->defaultItems(3),
                ]),

            Block::make('pricing_variation_2')
                ->label('Pricing - Variation 2')
                ->icon('heroicon-o-currency-dollar')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Repeater::make('plans')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('name')->required()->columnSpan(6),
                                TextInput::make('price')->required()->columnSpan(3),
                                TextInput::make('period')->default('month')->columnSpan(3),
                                Toggle::make('featured')->default(false)->columnSpan(12),
                                Repeater::make('features')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            TextInput::make('text')->required()->columnSpan(9),
                                            Toggle::make('included')->default(true)->columnSpan(3),
                                        ]),
                                    ])
                                    ->columnSpan(12)
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                                    ->defaultItems(5),
                                TextInput::make('button_text')->default('Get Started')->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Plan')
                        ->defaultItems(3),
                ]),

            Block::make('pricing_variation_3')
                ->label('Pricing - Variation 3')
                ->icon('heroicon-o-currency-dollar')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Repeater::make('plans')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('name')->required()->columnSpan(6),
                                TextInput::make('price')->required()->columnSpan(6),
                                Repeater::make('features')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            TextInput::make('text')->required()->columnSpan(9),
                                            Toggle::make('included')->default(true)->columnSpan(3),
                                        ]),
                                    ])
                                    ->columnSpan(12)
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                                    ->defaultItems(5),
                                TextInput::make('button_text')->default('Choose Plan')->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Plan')
                        ->defaultItems(3),
                ]),

            Block::make('pricing_variation_4')
                ->label('Pricing - Variation 4')
                ->icon('heroicon-o-currency-dollar')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Repeater::make('plans')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('name')->required()->columnSpan(6),
                                TextInput::make('price')->required()->columnSpan(6),
                                Repeater::make('features')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            TextInput::make('text')->required()->columnSpan(9),
                                            Toggle::make('included')->default(true)->columnSpan(3),
                                        ]),
                                    ])
                                    ->columnSpan(12)
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                                    ->defaultItems(5),
                                TextInput::make('button_text')->default('Get Started')->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Plan')
                        ->defaultItems(3),
                ]),

            Block::make('portfolio_grid')
                ->label('Portfolio Grid')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3)->columnSpan(6),
                    Toggle::make('sortable')->default(true)->columnSpan(6),
                    Repeater::make('items')
                        ->schema([
                            TextInput::make('title'),
                            TextInput::make('category'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                            TextInput::make('link'),
                        ])
                        ->columns(2)
                        ->defaultItems(6)
                        ->columnSpan(12),
                ]),

            Block::make('portfolio_variation_2')
                ->label('Portfolio - Variation 2')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3)->columnSpan(6),
                    Toggle::make('sortable')->default(true)->columnSpan(6),
                    Repeater::make('items')
                        ->schema([
                            TextInput::make('title'),
                            TextInput::make('category'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(6)
                        ->columnSpan(12),
                ]),

            Block::make('portfolio_variation_3')
                ->label('Portfolio - Variation 3')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3)->columnSpan(12),
                    Repeater::make('items')
                        ->schema([
                            TextInput::make('title'),
                            TextInput::make('category'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(6)
                        ->columnSpan(12),
                ]),

            Block::make('portfolio_variation_4')
                ->label('Portfolio - Variation 4')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3)->columnSpan(12),
                    Repeater::make('items')
                        ->schema([
                            TextInput::make('title'),
                            TextInput::make('category'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(6)
                        ->columnSpan(12),
                ]),

            Block::make('testimonials')
                ->label('Testimonials')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Textarea::make('description')->columnSpan(12),
                    Repeater::make('testimonials')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('author_name')->required()->columnSpan(6),
                                TextInput::make('author_position')->columnSpan(6),
                                TextInput::make('author_location')->columnSpan(6),
                                Select::make('rating')->options([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'])->default(5)->columnSpan(6),
                                FileUpload::make('author_image')->image()->disk('public')->directory('blocks')->columnSpan(12),
                                Textarea::make('content')->required()->rows(3)->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['author_name'] ?? 'Testimonial')
                        ->defaultItems(3),
                ]),

            Block::make('testimonials_variation_2')
                ->label('Testimonials - Variation 2')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Textarea::make('description')->columnSpan(12),
                    Repeater::make('testimonials')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('author_name')->required()->columnSpan(6),
                                TextInput::make('author_position')->columnSpan(6),
                                Select::make('rating')->options([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'])->default(5)->columnSpan(12),
                                FileUpload::make('author_image')->image()->disk('public')->directory('blocks')->columnSpan(12),
                                Textarea::make('content')->required()->rows(3)->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['author_name'] ?? 'Testimonial')
                        ->defaultItems(3),
                ]),

            Block::make('process')
                ->label('Process Steps')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->columnSpan(12),
                    Repeater::make('steps')
                        ->schema([
                            TextInput::make('number'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                            Select::make('icon')
                                ->label('Icon')
                                ->options(FlaticonList::getSelectOptions())
                                ->searchable()
                                ->allowHtml()
                                ->placeholder('Select an icon'),
                        ])
                        ->columns(2)
                        ->columnSpan(12)
                        ->defaultItems(4),
                ]),

            Block::make('process_variation_2')
                ->label('Process - Variation 2')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Repeater::make('steps')
                        ->schema([
                            TextInput::make('number'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                            Select::make('icon')
                                ->label('Icon')
                                ->options(FlaticonList::getSelectOptions())
                                ->searchable()
                                ->allowHtml()
                                ->placeholder('Select an icon'),
                        ])
                        ->columns(2)
                        ->defaultItems(4)
                        ->columnSpan(12),
                ]),

            Block::make('history_timeline')
                ->label('Timeline')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Repeater::make('events')
                        ->schema([
                            TextInput::make('year'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(5)
                        ->columnSpan(12),
                ]),

            Block::make('features_grid')
                ->label('Features Grid')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->columnSpan(12),
                    Repeater::make('features')
                        ->schema([
                            Select::make('icon')
                                ->label('Icon')
                                ->options(FlaticonList::getSelectOptions())
                                ->searchable()
                                ->allowHtml()
                                ->placeholder('Select an icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columnSpan(12)
                        ->columns(2)
                        ->defaultItems(4),
                ]),

            Block::make('features_slider')
                ->label('Features Slider')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(6),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(4)->columnSpan(6),
                    Repeater::make('features')
                        ->schema([
                            Select::make('icon')
                                ->label('Icon')
                                ->options(FlaticonList::getSelectOptions())
                                ->searchable()
                                ->allowHtml()
                                ->placeholder('Select an icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columnSpan(12)
                        ->defaultItems(4),
                ]),

            Block::make('icon_box')
                ->label('Icon Box')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Textarea::make('description')->columnSpan(12),
                    Select::make('icon')
                        ->label('Icon')
                        ->options(FlaticonList::getSelectOptions())
                        ->searchable()
                        ->allowHtml()
                        ->placeholder('Select an icon')
                        ->columnSpan(12),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks')->columnSpan(12),
                    Repeater::make('features')
                        ->schema([
                            Select::make('icon')
                                ->label('Icon')
                                ->options(FlaticonList::getSelectOptions())
                                ->searchable()
                                ->allowHtml()
                                ->placeholder('Select an icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2)
                        ->defaultItems(4)
                        ->columnSpan(12),
                ]),

            Block::make('icon_box_variation_2')
                ->label('Icon Box - Variation 2')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Textarea::make('description')->columnSpan(12),
                    Repeater::make('advantages')
                        ->schema([
                            Select::make('icon')
                                ->label('Icon')
                                ->options(FlaticonList::getSelectOptions())
                                ->searchable()
                                ->allowHtml()
                                ->placeholder('Select an icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2)
                        ->defaultItems(3)
                        ->columnSpan(12),
                ]),

            Block::make('accordion')
                ->label('Accordion (Rich)')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Repeater::make('items')
                        ->schema([
                            TextInput::make('question'),
                            RichEditor::make('answer'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(3)
                        ->columnSpan(12),
                ]),

            Block::make('tabs')
                ->label('Tabs')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Repeater::make('tabs')
                        ->schema([
                            TextInput::make('label'),
                            RichEditor::make('content'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->defaultItems(3)
                        ->columnSpan(12),
                ]),

            Block::make('team')
                ->label('Team Members')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
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
                        ->columns(2)
                        ->defaultItems(3)
                        ->columnSpan(12),
                ]),

            Block::make('awards')
                ->label('Awards')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Repeater::make('awards')
                        ->schema([
                            TextInput::make('title'),
                            TextInput::make('year'),
                            Textarea::make('description'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(4)
                        ->columnSpan(12),
                ]),

            Block::make('clients_logos')
                ->label('Clients Logos')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    Textarea::make('description')->columnSpan(12),
                    Repeater::make('clients')
                        ->schema([
                            TextInput::make('name'),
                            FileUpload::make('logo')->image()->disk('public')->directory('blocks'),
                            TextInput::make('url'),
                        ])
                        ->columns(2)
                        ->defaultItems(6)
                        ->columnSpan(12),
                ]),

            Block::make('before_after')
                ->label('Before/After')
                ->columns(12)
                ->schema([
                    TextInput::make('title')->columnSpan(12),
                    FileUpload::make('before_image')->image()->disk('public')->directory('blocks')->columnSpan(6),
                    FileUpload::make('after_image')->image()->disk('public')->directory('blocks')->columnSpan(6),
                    Textarea::make('description')->columnSpan(12),
                ]),

            Block::make('cta')
                ->label('Call to Action')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')->columnSpan(6),
                    TextInput::make('title')->columnSpan(6),
                    TextInput::make('phone')->columnSpan(6),
                    Select::make('phone_icon')
                        ->label('Phone Icon')
                        ->options(FlaticonList::getSelectOptions())
                        ->searchable()
                        ->allowHtml()
                        ->placeholder('Select an icon')
                        ->columnSpan(6),
                    TextInput::make('badge_text')->columnSpan(12),
                    Repeater::make('rotating_words')
                        ->label('Rotating Words')
                        ->schema([
                            TextInput::make('word'),
                        ])
                        ->defaultItems(4)
                        ->columnSpan(12),
                ]),

            Block::make('static')
                ->label('Static Content (Homepage-1)')
                ->columns(12)
                ->schema([
                    TextInput::make('note')
                        ->label('Note')
                        ->default('This is a static block containing About + Statistics sections from homepage-1.html')
                        ->disabled()
                        ->columnSpan(12),
                ]),

            Block::make('posts_grid')
                ->label('Dynamic Content Grid')
                ->icon('heroicon-o-document-text')
                ->columns(12)
                ->schema([
                    Select::make('content_type')
                        ->label('Content Type')
                        ->options([
                            'posts' => 'Posts',
                            'events' => 'Events',
                            'services' => 'Services',
                        ])
                        ->default('posts')
                        ->required()
                        ->columnSpan(6),

                    Select::make('columns')
                        ->label('Columns')
                        ->options([2 => '2', 3 => '3', 4 => '4'])
                        ->default(3)
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Section Title (Optional)')
                        ->placeholder('Leave empty if not needed')
                        ->columnSpan(12),

                    Toggle::make('show_sortable')
                        ->label('Show Category Filter (Posts Only)')
                        ->default(true)
                        ->columnSpan(12),
                ]),

            Block::make('events_grid')
                ->label('Events Grid (Legacy)')
                ->icon('heroicon-o-calendar')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Section Title')
                        ->placeholder('Optional section title')
                        ->columnSpan(12),

                    Select::make('columns')
                        ->label('Columns')
                        ->options([2 => '2', 3 => '3', 4 => '4'])
                        ->default(3)
                        ->columnSpan(12),
                ]),
        ];
    }
}

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
use Filament\Schemas\Components\Fieldset;
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
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Since 2015')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Transforming business environments...')
                        ->required()
                        ->columnSpan(6),

                    Textarea::make('description')
                        ->label('Description')
                        ->placeholder('We elevate professional spaces...')
                        ->rows(3)
                        ->columnSpan(12),

                    FileUpload::make('left_image_1')
                        ->label('Left Image 1 (Frame/Clock)')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(6),

                    FileUpload::make('left_image_2')
                        ->label('Left Image 2')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(6),

                    FileUpload::make('right_image_1')
                        ->label('Right Image 1')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(6),

                    FileUpload::make('right_image_2')
                        ->label('Right Image 2 (Lamp)')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(6),

                    FileUpload::make('signature_image')
                        ->label('Signature Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
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
                                    ->default('pbmit-xinterio-icon-tools')
                                    ->placeholder('Search and select an icon')
                                    ->columnSpan(6),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('Executive Suites')
                                    ->required()
                                    ->columnSpan(6),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Feature')
                        ->defaultItems(4),
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
                    FileUpload::make('main_image')
                        ->label('Main Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(6),

                    FileUpload::make('second_image')
                        ->label('Second Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(6),

                    TextInput::make('stat_number')
                        ->label('Statistic Number')
                        ->placeholder('25')
                        ->columnSpan(4),

                    TextInput::make('stat_suffix')
                        ->label('Statistic Suffix')
                        ->placeholder('+')
                        ->columnSpan(4),

                    TextInput::make('stat_title')
                        ->label('Statistic Title')
                        ->placeholder('Years of Excellence')
                        ->columnSpan(4),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Our Distinction')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Exceptional workspaces for exceptional leaders.')
                        ->required()
                        ->columnSpan(6),

                    Textarea::make('description')
                        ->label('Description')
                        ->placeholder('We curate premium executive environments...')
                        ->rows(3)
                        ->columnSpan(12),

                    Repeater::make('numbered_features')
                        ->label('Numbered Features')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('number')
                                    ->label('Number')
                                    ->placeholder('01.')
                                    ->columnSpan(3),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->placeholder('Bespoke Luxury Workspace Solutions')
                                    ->columnSpan(9),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => ($state['number'] ?? '').($state['number'] && $state['title'] ? ' - ' : '').($state['title'] ?? 'Feature'))
                        ->defaultItems(2)
                        ->minItems(1),

                    Repeater::make('icon_boxes')
                        ->label('Icon Boxes')
                        ->schema([
                            Grid::make(12)->schema([
                                FileUpload::make('icon_image')
                                    ->label('Icon Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blocks')
                                    ->imageEditor()
                                    ->columnSpan(12),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->placeholder('Join our 5000+ distinguished members')
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Icon Box')
                        ->defaultItems(2)
                        ->minItems(1),

                    TextInput::make('button_text')
                        ->label('Button Text')
                        ->placeholder('More about')
                        ->columnSpan(6),

                    TextInput::make('button_link')
                        ->label('Button Link')
                        ->placeholder('about-us.html')
                        ->columnSpan(6),
                ]),

            Block::make('services_grid')
                ->label('Services Grid')
                ->icon('heroicon-o-squares-2x2')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Since 2015')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Different needs, exceptional solutions.')
                        ->required()
                        ->columnSpan(6),

                    Textarea::make('description')
                        ->label('Description')
                        ->placeholder('Tailored workspace solutions designed for every stage of your professional journey.')
                        ->rows(2)
                        ->columnSpan(12),

                    TextInput::make('highlight_text')
                        ->label('Highlight Text')
                        ->placeholder('Service')
                        ->columnSpan(12),

                    Repeater::make('services')
                        ->label('Services')
                        ->schema([
                            Grid::make(12)->schema([
                                FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blocks')
                                    ->imageEditor()
                                    ->columnSpan(12),

                                TextInput::make('number')
                                    ->label('Number')
                                    ->placeholder('01')
                                    ->columnSpan(4),

                                Select::make('icon')
                                    ->label('Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->placeholder('Search and select an icon')
                                    ->columnSpan(8),

                                TextInput::make('category')
                                    ->label('Category')
                                    ->placeholder('Private Office')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('Executive Suites')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('link')
                                    ->label('Link URL')
                                    ->placeholder('service-details.html')
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => ($state['number'] ?? '').($state['number'] && $state['title'] ? ' - ' : '').($state['title'] ?? 'Service'))
                        ->defaultItems(6)
                        ->minItems(1),
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
                ->label('Services Grid - Variation 3 (Premium Services Slider)')
                ->icon('heroicon-o-squares-2x2')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Section Title')
                        ->placeholder('Premium Services For Leaders')
                        ->required()
                        ->columnSpan(12),

                    Repeater::make('services')
                        ->label('Services')
                        ->schema([
                            Grid::make(12)->schema([
                                FileUpload::make('image')
                                    ->label('Service Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blocks')
                                    ->imageEditor()
                                    ->columnSpan(12),

                                TextInput::make('number')
                                    ->label('Number')
                                    ->placeholder('01')
                                    ->columnSpan(4),

                                TextInput::make('category')
                                    ->label('Category')
                                    ->placeholder('Offices')
                                    ->required()
                                    ->columnSpan(8),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('Private Executive Offices')
                                    ->required()
                                    ->columnSpan(12),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->placeholder('Our luxury offices deliver prestige and privacy...')
                                    ->rows(2)
                                    ->columnSpan(12),

                                Select::make('icon')
                                    ->label('Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->required()
                                    ->default('pbmit-xinterio-icon-premium')
                                    ->placeholder('Search and select an icon')
                                    ->columnSpan(6),

                                TextInput::make('link')
                                    ->label('Link URL')
                                    ->placeholder('service-details.html')
                                    ->columnSpan(6),

                                Select::make('button_icon')
                                    ->label('Button Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->default('pbmit-base-icon-angle-right')
                                    ->placeholder('Search and select an icon')
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => ($state['number'] ?? '').($state['number'] && $state['title'] ? ' - ' : '').($state['title'] ?? 'Service'))
                        ->defaultItems(6)
                        ->minItems(1),

                    FileUpload::make('clock_image')
                        ->label('Clock Decorative Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(6),

                    FileUpload::make('frame_image')
                        ->label('Frame Decorative Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(6),
                ]),

            Block::make('services_grid_variation_4')
                ->label('Services Grid - Variation 4 (What Can We Offer)')
                ->icon('heroicon-o-squares-2x2')
                ->columns(12)
                ->schema([
                    FileUpload::make('left_main_image')
                        ->label('Left Main Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(12),

                    FileUpload::make('icon_box_image')
                        ->label('Icon Box Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(6),

                    TextInput::make('icon_box_text')
                        ->label('Icon Box Text')
                        ->placeholder('Join our 2500+ executive members')
                        ->columnSpan(6),

                    Select::make('phone_icon')
                        ->label('Phone Icon')
                        ->options(FlaticonList::getSelectOptions())
                        ->searchable()
                        ->default('pbmit-base-icon-phone-volume-solid-1')
                        ->placeholder('Search and select an icon')
                        ->columnSpan(6),

                    TextInput::make('phone_number')
                        ->label('Phone Number')
                        ->placeholder('+125-8845-5421')
                        ->columnSpan(6),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Premium Offerings')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Executive Benefits')
                        ->required()
                        ->columnSpan(6),

                    Repeater::make('services')
                        ->label('Services')
                        ->schema([
                            Grid::make(12)->schema([
                                FileUpload::make('image')
                                    ->label('Service Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blocks')
                                    ->imageEditor()
                                    ->columnSpan(12),

                                TextInput::make('category')
                                    ->label('Category')
                                    ->placeholder('Executive')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('Private Office Suites')
                                    ->required()
                                    ->columnSpan(6),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->placeholder('Premium dedicated offices designed for business leadership')
                                    ->rows(2)
                                    ->columnSpan(12),

                                TextInput::make('link')
                                    ->label('Link URL')
                                    ->placeholder('service-details.html')
                                    ->columnSpan(9),

                                Select::make('button_icon')
                                    ->label('Button Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->default('pbmit-base-icon-pbmit-up-arrow')
                                    ->placeholder('Search and select an icon')
                                    ->columnSpan(3),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Service')
                        ->defaultItems(6)
                        ->minItems(1),
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
                ->label('Services - Variation 3 (We Design)')
                ->icon('heroicon-o-briefcase')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Welcome to Executive Excellence')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('We craft sophisticated, executive spaces.')
                        ->required()
                        ->columnSpan(6),

                    Textarea::make('description')
                        ->label('Description')
                        ->placeholder('We carefully curate all workspace environments...')
                        ->rows(3)
                        ->columnSpan(12),

                    TextInput::make('button_text')
                        ->label('Button Text')
                        ->placeholder('Discover More')
                        ->columnSpan(6),

                    TextInput::make('button_link')
                        ->label('Button Link')
                        ->placeholder('contact-us.html')
                        ->columnSpan(6),

                    FileUpload::make('main_image')
                        ->label('Main Center Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(12),

                    Repeater::make('services')
                        ->label('Service Icon Boxes')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')
                                    ->label('Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->required()
                                    ->default('pbmit-xinterio-icon-axis')
                                    ->placeholder('Search and select an icon')
                                    ->columnSpan(12),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('Transparent Pricing')
                                    ->required()
                                    ->columnSpan(12),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->placeholder('We offer competitive and premium rates...')
                                    ->rows(2)
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Service')
                        ->defaultItems(4)
                        ->minItems(1),
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
                ->label('Portfolio - Variation 2 (Minimalism Slider)')
                ->icon('heroicon-o-photo')
                ->columns(12)
                ->schema([
                    Select::make('columns')
                        ->label('Columns')
                        ->options([
                            '2' => '2 Columns',
                            '3' => '3 Columns',
                            '4' => '4 Columns',
                            '5' => '5 Columns',
                        ])
                        ->default('3')
                        ->required()
                        ->columnSpan(6),

                    Toggle::make('autoplay')
                        ->label('Enable Autoplay')
                        ->default(false)
                        ->columnSpan(6),

                    Repeater::make('items')
                        ->label('Portfolio Items')
                        ->schema([
                            Grid::make(12)->schema([
                                FileUpload::make('image')
                                    ->label('Portfolio Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blocks')
                                    ->imageEditor()
                                    ->required()
                                    ->columnSpan(12),

                                TextInput::make('category')
                                    ->label('Category')
                                    ->placeholder('Executive Office')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('Innovation')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('category_link')
                                    ->label('Category Link URL')
                                    ->placeholder('portfolio-grid-col-3.html')
                                    ->columnSpan(6),

                                TextInput::make('link')
                                    ->label('Portfolio Link URL')
                                    ->placeholder('portfolio-detail-style-1.html')
                                    ->columnSpan(6),

                                Select::make('button_icon')
                                    ->label('Button Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->default('pbmit-base-icon-pbmit-up-arrow')
                                    ->placeholder('Search and select an icon')
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Portfolio Item')
                        ->defaultItems(8)
                        ->minItems(1),
                ]),

            Block::make('portfolio_variation_3')
                ->label('Portfolio - Variation 3')
                ->icon('heroicon-o-photo')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Section Title')
                        ->placeholder('Explore Our Executive Workspace Portfolio')
                        ->required()
                        ->columnSpan(12),

                    Toggle::make('show_sortable')
                        ->label('Show Category Filter')
                        ->default(true)
                        ->columnSpan(6),

                    Select::make('columns')
                        ->label('Columns per Row')
                        ->options([
                            '6' => '2 Columns',
                            '4' => '3 Columns',
                            '3' => '4 Columns',
                        ])
                        ->default('4')
                        ->columnSpan(6),

                    Repeater::make('categories')
                        ->label('Sortable Categories')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('label')
                                    ->label('Category Label')
                                    ->placeholder('Private Office')
                                    ->required()
                                    ->columnSpan(8),

                                TextInput::make('slug')
                                    ->label('Category Slug (data-sortby)')
                                    ->placeholder('architecture')
                                    ->required()
                                    ->columnSpan(4),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['label'] ?? 'Category')
                        ->defaultItems(5)
                        ->minItems(1),

                    Repeater::make('items')
                        ->label('Portfolio Items')
                        ->schema([
                            Grid::make(12)->schema([
                                FileUpload::make('image')
                                    ->label('Portfolio Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blocks')
                                    ->imageEditor()
                                    ->required()
                                    ->columnSpan(12),

                                TextInput::make('category_slug')
                                    ->label('Category Slug (must match category slug above)')
                                    ->placeholder('architecture')
                                    ->required()
                                    ->helperText('Used for filtering - must match one of the category slugs defined above')
                                    ->columnSpan(6),

                                TextInput::make('category_display')
                                    ->label('Category Display Name')
                                    ->placeholder('Private Office')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('title')
                                    ->label('Portfolio Title')
                                    ->placeholder('Executive Hub')
                                    ->required()
                                    ->columnSpan(9),

                                Select::make('button_icon')
                                    ->label('Button Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->default('pbmit-base-icon-pbmit-up-arrow')
                                    ->placeholder('Search and select an icon')
                                    ->columnSpan(3),

                                TextInput::make('link')
                                    ->label('Link URL')
                                    ->placeholder('portfolio-detail-style-1.html')
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Portfolio Item')
                        ->defaultItems(6)
                        ->minItems(1),
                ]),

            Block::make('portfolio_variation_4')
                ->label('Portfolio - Variation 4 (Selected Case Slider)')
                ->icon('heroicon-o-photo')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Our Portfolio')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Featured Executive Spaces')
                        ->required()
                        ->columnSpan(6),

                    Select::make('columns')
                        ->label('Slider Columns')
                        ->options([
                            '2' => '2 Columns',
                            '3' => '3 Columns',
                            '4' => '4 Columns',
                        ])
                        ->default('3')
                        ->helperText('Number of items visible in the slider at once')
                        ->columnSpan(6),

                    Toggle::make('autoplay')
                        ->label('Enable Autoplay')
                        ->default(false)
                        ->columnSpan(6),

                    Repeater::make('items')
                        ->label('Portfolio Items (2 items per slide)')
                        ->schema([
                            Grid::make(12)->schema([
                                FileUpload::make('image')
                                    ->label('Portfolio Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blocks')
                                    ->imageEditor()
                                    ->required()
                                    ->columnSpan(12),

                                TextInput::make('category')
                                    ->label('Category')
                                    ->placeholder('C-Suite Office')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('Leadership Hub')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('category_link')
                                    ->label('Category Link URL')
                                    ->placeholder('#')
                                    ->columnSpan(6),

                                TextInput::make('link')
                                    ->label('Portfolio Link URL')
                                    ->placeholder('#')
                                    ->columnSpan(6),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Portfolio Item')
                        ->defaultItems(8)
                        ->minItems(2),
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
                ->label('Features Grid (Tab Style - Why Choose)')
                ->icon('heroicon-o-queue-list')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Section Title')
                        ->placeholder('Why Choose Executive Workspace?')
                        ->required()
                        ->columnSpan(12),

                    Repeater::make('tabs')
                        ->label('Feature Tabs')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('tab_label')
                                    ->label('Tab Label')
                                    ->placeholder('Premium Facilities')
                                    ->required()
                                    ->columnSpan(12),

                                TextInput::make('heading')
                                    ->label('Content Heading')
                                    ->placeholder('Elevating the standard of business excellence.')
                                    ->required()
                                    ->columnSpan(12),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->placeholder('Our executive workspace offers world-class amenities...')
                                    ->required()
                                    ->rows(3)
                                    ->columnSpan(12),

                                TextInput::make('highlight_number')
                                    ->label('Highlight Number')
                                    ->placeholder('25')
                                    ->columnSpan(4),

                                TextInput::make('highlight_suffix')
                                    ->label('Highlight Suffix')
                                    ->placeholder('+')
                                    ->columnSpan(4),

                                TextInput::make('highlight_text')
                                    ->label('Highlight Text')
                                    ->placeholder('Years serving executives')
                                    ->columnSpan(4),

                                Repeater::make('list_items')
                                    ->label('Feature List Items')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            Select::make('icon')
                                                ->label('Icon')
                                                ->options(FlaticonList::getSelectOptions())
                                                ->searchable()
                                                ->default('pbmit-base-icon-check-mark')
                                                ->placeholder('Search and select an icon')
                                                ->columnSpan(3),

                                            TextInput::make('text')
                                                ->label('List Item Text')
                                                ->placeholder('State-of-the-art conference facilities')
                                                ->required()
                                                ->columnSpan(9),
                                        ]),
                                    ])
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'List Item')
                                    ->defaultItems(4)
                                    ->minItems(1)
                                    ->columnSpan(12),

                                TextInput::make('button_text')
                                    ->label('Button Text')
                                    ->placeholder('Our Services')
                                    ->columnSpan(6),

                                TextInput::make('button_link')
                                    ->label('Button Link')
                                    ->placeholder('service-details.html')
                                    ->columnSpan(6),

                                FileUpload::make('image')
                                    ->label('Tab Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blocks')
                                    ->imageEditor()
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['tab_label'] ?? 'Tab')
                        ->defaultItems(5)
                        ->minItems(1)
                        ->columnSpan(12),
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
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Executive Excellence')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Creating the art of professional distinction.')
                        ->columnSpan(6),

                    Repeater::make('items')
                        ->label('Accordion Items')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('question')
                                    ->label('Question')
                                    ->required()
                                    ->placeholder('What defines our luxury workspace experience?')
                                    ->columnSpan(12),

                                Textarea::make('answer')
                                    ->label('Answer')
                                    ->required()
                                    ->rows(3)
                                    ->placeholder('Our workspaces feature premium Italian leather furnishings...')
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['question'] ?? 'Accordion Item')
                        ->defaultItems(4)
                        ->minItems(1)
                        ->columnSpan(12),

                    FileUpload::make('chair_image')
                        ->label('Chair Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->columnSpan(4),

                    FileUpload::make('sofa_image')
                        ->label('Sofa Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->columnSpan(4),

                    FileUpload::make('floor_image')
                        ->label('Floor Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->columnSpan(4),
                ]),

            Block::make('tabs')
                ->label('Tabs')
                ->icon('heroicon-o-folder')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Since 2015')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('What We Offer Your Enterprise')
                        ->required()
                        ->columnSpan(6),

                    Repeater::make('tabs')
                        ->label('Tab Items')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('label')
                                    ->label('Tab Label')
                                    ->required()
                                    ->placeholder('Technology Infrastructure')
                                    ->columnSpan(9),

                                Select::make('icon')
                                    ->label('Tab Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->default('pbmit-base-icon-pbmit-up-arrow')
                                    ->placeholder('Search and select an icon')
                                    ->columnSpan(3),

                                FileUpload::make('image')
                                    ->label('Content Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blocks')
                                    ->imageEditor()
                                    ->columnSpan(12),

                                TextInput::make('content_title')
                                    ->label('Content Title')
                                    ->required()
                                    ->placeholder('Uncompromising connectivity and enterprise security.')
                                    ->columnSpan(12),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->required()
                                    ->rows(3)
                                    ->placeholder('10Gbps fiber optic internet with 99.99% uptime guarantee...')
                                    ->columnSpan(12),

                                Repeater::make('features')
                                    ->label('Feature List')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            Select::make('icon')
                                                ->label('Icon')
                                                ->options(FlaticonList::getSelectOptions())
                                                ->searchable()
                                                ->default('pbmit-xinterio-icon-tick-mark')
                                                ->placeholder('Search and select an icon')
                                                ->columnSpan(3),

                                            TextInput::make('text')
                                                ->label('Feature Text')
                                                ->required()
                                                ->placeholder('10Gbps fiber optic with redundant connections')
                                                ->columnSpan(9),
                                        ]),
                                    ])
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                                    ->defaultItems(4)
                                    ->minItems(1)
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['label'] ?? 'Tab')
                        ->defaultItems(5)
                        ->minItems(1)
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

            Block::make('awards-award-achievement')
                ->label('Awards - Award Achievement')
                ->icon('heroicon-o-trophy')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Section Title')
                        ->placeholder('Awards & Recognition')
                        ->required()
                        ->columnSpan(12),

                    Repeater::make('awards')
                        ->label('Awards')
                        ->schema([
                            Grid::make(12)->schema([
                                FileUpload::make('icon_image')
                                    ->label('Award Badge/Icon Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('blocks')
                                    ->imageEditor()
                                    ->required()
                                    ->columnSpan(12),

                                TextInput::make('title')
                                    ->label('Award Title')
                                    ->placeholder('Top 5 Executive Workspace Provider 2023')
                                    ->required()
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Award')
                        ->defaultItems(5)
                        ->minItems(1),
                ]),

            Block::make('clients_logos')
                ->label('Clients Logos')
                ->columns(12)
                ->schema([
                    Repeater::make('clients')
                        ->label('Client Logos')
                        ->schema([
                            TextInput::make('name')
                                ->label('Client Name')
                                ->placeholder('Corporate Partner')
                                ->default('Corporate Partner')
                                ->columnSpan(12),
                            FileUpload::make('logo_grey')
                                ->label('Grey Logo (Default State)')
                                ->image()
                                ->disk('public')
                                ->directory('blocks/clients')
                                ->columnSpan(6),
                            FileUpload::make('logo_color')
                                ->label('Color Logo (Hover State)')
                                ->image()
                                ->disk('public')
                                ->directory('blocks/clients')
                                ->columnSpan(6),
                            TextInput::make('url')
                                ->label('Website URL')
                                ->url()
                                ->placeholder('https://example.com')
                                ->columnSpan(12),
                        ])
                        ->columns(12)
                        ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Client Logo')
                        ->defaultItems(8)
                        ->minItems(1)
                        ->columnSpan(8),
                    Fieldset::make('counter_section')
                        ->label('Counter Section')
                        ->schema([
                            TextInput::make('counter_number')
                                ->label('Counter Number')
                                ->numeric()
                                ->default('120')
                                ->required()
                                ->columnSpan(6),
                            TextInput::make('counter_suffix')
                                ->label('Counter Suffix')
                                ->placeholder('+')
                                ->default('+')
                                ->columnSpan(6),
                            Textarea::make('counter_text')
                                ->label('Counter Description')
                                ->default('Join the enterprises that trust Executive to elevate their business operations.')
                                ->required()
                                ->columnSpan(12),
                        ])
                        ->columns(12)
                        ->columnSpan(4),
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

<?php

namespace App\Services\Schemas;

use App\Models\Category;
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
use Filament\Schemas\Components\Section;

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

            Block::make('text_content')
                ->label('Text Content Section')
                ->icon('heroicon-o-document-text')
                ->columns(12)
                ->schema([
                    Select::make('section_size')
                        ->label('Section Padding')
                        ->options([
                            'section-lgb' => 'Small',
                            'section-lgt' => 'Medium',
                            'section-lgx' => 'Large',
                            'section-xl' => 'Extra Large',
                        ])
                        ->default('section-xl')
                        ->required()
                        ->selectablePlaceholder(false)
                        ->helperText('Choose the vertical padding for this section')
                        ->columnSpan(6),

                    Select::make('max_width')
                        ->label('Content Width')
                        ->options([
                            'narrow' => 'Narrow (70%)',
                            'medium' => 'Medium (85%)',
                            'full' => 'Full Width',
                        ])
                        ->default('full')
                        ->required()
                        ->selectablePlaceholder(false)
                        ->helperText('Choose the maximum width for content')
                        ->columnSpan(6),

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
                            'section-lgb' => 'Small (Bottom Padding)',
                            'section-lgt' => 'Medium (Light Spacing)',
                            'section-lgx' => 'Large (Extra Spacing)',
                            'section-xl' => 'Extra Large (Maximum Spacing)',
                        ])
                        ->default('section-xl')
                        ->required()
                        ->selectablePlaceholder(false)
                        ->helperText('Choose the amount of vertical spacing to add')
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
                        ->imageEditor()
                        ->columnSpan(12),

                    TextInput::make('year')
                        ->label('Started Year')
                        ->numeric()
                        ->default('2015')
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
                ->label('About - Variation 3 (We Design Thoughtful)')
                ->icon('heroicon-o-information-circle')
                ->columns(12)
                ->schema([
                    FileUpload::make('background_image')
                        ->label('Left Section Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(12),

                    Select::make('left_icon')
                        ->label('Left Section Icon')
                        ->options(FlaticonList::getSelectOptions())
                        ->searchable()
                        ->required()
                        ->default('pbmit-xinterio-icon-award')
                        ->placeholder('Search and select an icon')
                        ->columnSpan(6),

                    TextInput::make('left_title')
                        ->label('Left Section Title')
                        ->placeholder('Award-Winning Excellence')
                        ->helperText('Use <br> for line breaks if needed')
                        ->columnSpan(6),

                    TextInput::make('subtitle')
                        ->label('Right Section Subtitle')
                        ->placeholder('Since 2015')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Right Section Title')
                        ->placeholder('We architect premium, executive-caliber environments.')
                        ->required()
                        ->columnSpan(6),

                    Textarea::make('description')
                        ->label('Description')
                        ->placeholder('Our design philosophy combines sophisticated aesthetics...')
                        ->rows(3)
                        ->columnSpan(12),

                    Repeater::make('icon_boxes')
                        ->label('Icon Boxes (4 items in 2x2 grid)')
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
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Icon Box')
                        ->defaultItems(4)
                        ->minItems(1),

                    TextInput::make('signature_name')
                        ->label('Signature Name')
                        ->placeholder('A. El Sherbiny')
                        ->columnSpan(4),

                    TextInput::make('signature_position')
                        ->label('Signature Position')
                        ->placeholder('Founder')
                        ->columnSpan(4),

                    FileUpload::make('signature_image')
                        ->label('Signature Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(4),
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

                                Select::make('category')
                                    ->label('Category')
                                    ->options(Category::pluck('name', 'slug'))
                                    ->searchable()
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
                ->label('Services Grid - Variation 2 (Crafting Environments)')
                ->icon('heroicon-o-squares-2x2')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Our Expertise')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Crafting environments for executive excellence.')
                        ->required()
                        ->columnSpan(6),

                    TextInput::make('counter_number')
                        ->label('Counter Number')
                        ->numeric()
                        ->placeholder('460')
                        ->required()
                        ->columnSpan(4),

                    TextInput::make('counter_suffix')
                        ->label('Counter Suffix')
                        ->placeholder('+')
                        ->columnSpan(4),

                    TextInput::make('counter_text')
                        ->label('Counter Description')
                        ->placeholder('Executive Workspace Solutions <br> Specialists at Your Service')
                        ->helperText('Use <br> for line breaks if needed')
                        ->required()
                        ->columnSpan(4),

                    FileUpload::make('background_image')
                        ->label('Right Section Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
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
                                    ->columnSpan(6),

                                Select::make('category')
                                    ->label('Category')
                                    ->options(Category::pluck('name', 'slug'))
                                    ->searchable()
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('Executive Office Design')
                                    ->required()
                                    ->columnSpan(12),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->placeholder('Premium workspace solutions for business leaders worldwide')
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
                        ->itemLabel(fn (array $state): ?string => ($state['number'] ?? '').($state['number'] && $state['title'] ? ' - ' : '').($state['title'] ?? 'Service'))
                        ->defaultItems(6)
                        ->minItems(1),
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

                                Select::make('category')
                                    ->label('Category')
                                    ->options(Category::pluck('name', 'slug'))
                                    ->searchable()
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

                                Select::make('category')
                                    ->label('Category')
                                    ->options(Category::pluck('name', 'slug'))
                                    ->searchable()
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
                ->label('Services - Variation 2 (Thoughtful Livable Spaces)')
                ->icon('heroicon-o-briefcase')
                ->columns(12)
                ->schema([
                    // Left Section - Images
                    FileUpload::make('left_image_1')
                        ->label('Left Section - Main Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(6),

                    FileUpload::make('left_image_2')
                        ->label('Left Section - Second Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(6),

                    FileUpload::make('left_image_frame')
                        ->label('Left Section - Frame/Overlay Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(12),

                    // Right Section - Background and Content
                    FileUpload::make('right_background_pattern')
                        ->label('Right Section - Background Pattern')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(12),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Our Excellence')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Premium Executive Workspace Solutions')
                        ->required()
                        ->columnSpan(6),

                    Textarea::make('description')
                        ->label('Description')
                        ->placeholder('Every detail of our executive workspaces is meticulously crafted...')
                        ->rows(3)
                        ->columnSpan(12),

                    Repeater::make('list_items')
                        ->label('List Items')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('text')
                                    ->label('List Item Text')
                                    ->placeholder('Dedicated concierge service exclusively for members')
                                    ->required()
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'List Item')
                        ->defaultItems(3)
                        ->minItems(1),

                    FileUpload::make('clock_image')
                        ->label('Clock/Decorative Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(12),

                    // Bottom Section - Icon Boxes
                    Repeater::make('icon_boxes')
                        ->label('Bottom Icon Boxes')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')
                                    ->label('Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->required()
                                    ->columnSpan(6)
                                    ->default('pbmit-xinterio-icon-compass')
                                    ->placeholder('Search and select an icon'),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('Elite Professional Network')
                                    ->required()
                                    ->columnSpan(6),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->placeholder('3,500,000+ executives including 850,000+ entrepreneurs...')
                                    ->rows(2)
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Icon Box')
                        ->defaultItems(2)
                        ->minItems(1),
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
                    FileUpload::make('background_image')
                        ->label('Background Pattern Image')
                        ->image()
                        ->disk('public')
                        ->directory('images/sections')
                        ->imageEditor()
                        ->columnSpan(12),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->default('Membership Plans')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->default('Premium workspace for visionary leaders!')
                        ->columnSpan(6),

                    Textarea::make('description')
                        ->label('Description')
                        ->rows(3)
                        ->columnSpan(12),

                    Repeater::make('plans')
                        ->label('Pricing Plans')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('name')
                                    ->label('Plan Name')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('price')
                                    ->label('Price')
                                    ->required()
                                    ->columnSpan(3),

                                TextInput::make('currency')
                                    ->label('Currency Symbol')
                                    ->default('EGP')
                                    ->columnSpan(3),

                                TextInput::make('period')
                                    ->label('Period')
                                    ->default('/mo')
                                    ->columnSpan(6),

                                Toggle::make('featured')
                                    ->label('Featured Plan')
                                    ->default(false)
                                    ->columnSpan(6),

                                Repeater::make('features')
                                    ->label('Features')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            TextInput::make('text')
                                                ->label('Feature Text')
                                                ->required()
                                                ->columnSpan(9),

                                            Toggle::make('has_icon')
                                                ->label('Show Checkmark Icon')
                                                ->default(true)
                                                ->columnSpan(3),
                                        ]),
                                    ])
                                    ->columnSpan(12)
                                    ->collapsed()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                                    ->defaultItems(5),

                                TextInput::make('button_text')
                                    ->label('Button Text')
                                    ->default('Reserve Your Space')
                                    ->columnSpan(6),

                                TextInput::make('button_link')
                                    ->label('Button Link')
                                    ->default('#')
                                    ->columnSpan(6),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Plan')
                        ->defaultItems(3),
                ]),

            Block::make('pricing_variation_2')
                ->label('Pricing - Variation 2')
                ->icon('heroicon-o-currency-dollar')
                ->columns(12)
                ->schema([
                    FileUpload::make('background_image')
                        ->label('Background Pattern Image')
                        ->image()
                        ->disk('public')
                        ->directory('images/sections')
                        ->imageEditor()
                        ->columnSpan(12),

                    TextInput::make('currency')
                        ->label('Currency Symbol')
                        ->default('EGP')
                        ->columnSpan(4),

                    TextInput::make('subtitle')
                        ->label('Sidebar Subtitle')
                        ->default('Membership Plans')
                        ->columnSpan(4),

                    TextInput::make('title')
                        ->label('Sidebar Title')
                        ->default('Choose plan for your business')
                        ->columnSpan(4),

                    Repeater::make('benefits')
                        ->label('Sidebar Benefits')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')
                                    ->label('Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->required()
                                    ->default('pbmit-xinterio-icon-check-mark')
                                    ->columnSpan(12),

                                TextInput::make('text')
                                    ->label('Benefit Text')
                                    ->required()
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Benefit')
                        ->defaultItems(3),

                    TextInput::make('button_text')
                        ->label('Sidebar Button Text')
                        ->default('View All Plans')
                        ->columnSpan(6),

                    TextInput::make('button_link')
                        ->label('Sidebar Button Link')
                        ->url()
                        ->default('#')
                        ->columnSpan(6),

                    Repeater::make('plans')
                        ->label('Pricing Plans')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('name')
                                    ->label('Plan Name')
                                    ->required()
                                    ->placeholder('Professional')
                                    ->columnSpan(6),

                                TextInput::make('price')
                                    ->label('Price')
                                    ->required()
                                    ->numeric()
                                    ->placeholder('27')
                                    ->columnSpan(3),

                                TextInput::make('period')
                                    ->label('Period')
                                    ->default('/Mo')
                                    ->columnSpan(3),

                                Toggle::make('featured')
                                    ->label('Featured Plan')
                                    ->default(false)
                                    ->columnSpan(12),

                                Repeater::make('features')
                                    ->label('Plan Features')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            TextInput::make('text')
                                                ->label('Feature')
                                                ->required()
                                                ->columnSpan(12),
                                        ]),
                                    ])
                                    ->columnSpan(12)
                                    ->collapsed()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                                    ->defaultItems(5),

                                TextInput::make('button_text')
                                    ->label('Button Text')
                                    ->default('Join Now')
                                    ->columnSpan(6),

                                TextInput::make('button_link')
                                    ->label('Button Link')
                                    ->url()
                                    ->default('#')
                                    ->columnSpan(6),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Plan')
                        ->defaultItems(2),
                ]),

            Block::make('pricing_variation_3')
                ->label('Pricing - Variation 3')
                ->icon('heroicon-o-currency-dollar')
                ->columns(12)
                ->schema([
                    FileUpload::make('background_image')
                        ->label('Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('images/sections')
                        ->imageEditor()
                        ->columnSpan(12),

                    // Right Section (Content)
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->default('Membership Plans')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->default('Choose your executive workspace')
                        ->columnSpan(6),

                    Repeater::make('features')
                        ->label('Features List')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')
                                    ->label('Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->default('pbmit-xinterio-icon-check-mark')
                                    ->columnSpan(6),

                                TextInput::make('text')
                                    ->label('Feature Text')
                                    ->required()
                                    ->columnSpan(6),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                        ->defaultItems(3),

                    TextInput::make('button_text')
                        ->label('Button Text')
                        ->default('View All Plans')
                        ->columnSpan(6),

                    TextInput::make('button_link')
                        ->label('Button Link')
                        ->default('#')
                        ->columnSpan(6),

                    // Pricing Plans (Left Section)
                    Repeater::make('plans')
                        ->label('Pricing Plans')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('name')
                                    ->label('Plan Name')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('price')
                                    ->label('Price')
                                    ->required()
                                    ->columnSpan(3),

                                TextInput::make('currency')
                                    ->label('Currency')
                                    ->default('EGP')
                                    ->columnSpan(3),

                                TextInput::make('period')
                                    ->label('Period')
                                    ->default('/Mo')
                                    ->columnSpan(6),

                                Toggle::make('featured')
                                    ->label('Featured Plan')
                                    ->default(false)
                                    ->columnSpan(6),

                                Repeater::make('features')
                                    ->label('Plan Features')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            TextInput::make('text')
                                                ->label('Feature Text')
                                                ->required()
                                                ->columnSpan(12),
                                        ]),
                                    ])
                                    ->columnSpan(12)
                                    ->collapsed()
                                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                                    ->defaultItems(5),

                                TextInput::make('button_text')
                                    ->label('Button Text')
                                    ->default('Select Plan')
                                    ->columnSpan(6),

                                TextInput::make('button_link')
                                    ->label('Button Link')
                                    ->default('#')
                                    ->columnSpan(6),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Plan')
                        ->defaultItems(2),
                ]),

            Block::make('pricing_variation_4')
                ->label('Pricing - Variation 4 (Examination Package)')
                ->icon('heroicon-o-currency-dollar')
                ->columns(12)
                ->schema([
                    FileUpload::make('background_image')
                        ->label('Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(12),

                    // Left Box
                    TextInput::make('left_title')
                        ->label('Left Box Title')
                        ->placeholder('Executive <br> Member Support.')
                        ->helperText('Use <br> for line breaks if needed')
                        ->required()
                        ->columnSpan(6),

                    TextInput::make('left_description')
                        ->label('Left Box Description')
                        ->placeholder('Dedicated assistance for business leaders...')
                        ->required()
                        ->columnSpan(6),

                    Select::make('left_icon')
                        ->label('Left Box Icon')
                        ->options(FlaticonList::getSelectOptions())
                        ->searchable()
                        ->required()
                        ->default('pbmit-xinterio-icon-offer')
                        ->placeholder('Search and select an icon')
                        ->columnSpan(6),

                    TextInput::make('left_button_text')
                        ->label('Left Box Button Text')
                        ->placeholder('View All Services')
                        ->required()
                        ->columnSpan(3),

                    TextInput::make('left_button_link')
                        ->label('Left Box Button Link')
                        ->placeholder('faq.html')
                        ->columnSpan(3),

                    // Center Box
                    TextInput::make('center_title')
                        ->label('Center Box Title')
                        ->placeholder('Premium Executive <br>Membership Package')
                        ->helperText('Use <br> for line breaks if needed')
                        ->required()
                        ->columnSpan(6),

                    TextInput::make('center_description')
                        ->label('Center Box Description')
                        ->placeholder('Exclusive access to luxury workspaces...')
                        ->required()
                        ->columnSpan(6),

                    Repeater::make('center_features')
                        ->label('Center Box Features List')
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
                                    ->label('Feature Text')
                                    ->placeholder('Dedicated executive concierge team')
                                    ->required()
                                    ->columnSpan(9),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? 'Feature')
                        ->defaultItems(3)
                        ->minItems(1),

                    TextInput::make('center_button_text')
                        ->label('Center Box Button Text')
                        ->placeholder('Explore Membership Tiers')
                        ->required()
                        ->columnSpan(6),

                    TextInput::make('center_button_link')
                        ->label('Center Box Button Link')
                        ->placeholder('contact-us.html')
                        ->columnSpan(6),

                    // Right Box
                    TextInput::make('right_title')
                        ->label('Right Box Title')
                        ->placeholder('Discover Our <br>Luxury Workspaces')
                        ->helperText('Use <br> for line breaks if needed')
                        ->required()
                        ->columnSpan(6),

                    TextInput::make('right_description')
                        ->label('Right Box Description')
                        ->placeholder('Explore our portfolio of prestigious locations...')
                        ->required()
                        ->columnSpan(6),

                    Select::make('right_icon')
                        ->label('Right Box Icon')
                        ->options(FlaticonList::getSelectOptions())
                        ->searchable()
                        ->required()
                        ->default('pbmit-xinterio-icon-award')
                        ->placeholder('Search and select an icon')
                        ->columnSpan(6),

                    TextInput::make('right_button_text')
                        ->label('Right Box Button Text')
                        ->placeholder('View All Locations')
                        ->required()
                        ->columnSpan(3),

                    TextInput::make('right_button_link')
                        ->label('Right Box Button Link')
                        ->placeholder('portfolio-grid-col-3.html')
                        ->columnSpan(3),
                ]),

            Block::make('portfolio_grid')
                ->label('Portfolio Grid')
                ->icon('heroicon-o-photo')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Main Title')
                        ->default('Explore our executive projects')
                        ->required()
                        ->columnSpan(12),

                    TextInput::make('stat_number')
                        ->label('Statistics Number')
                        ->numeric()
                        ->default('460')
                        ->columnSpan(4),

                    TextInput::make('stat_suffix')
                        ->label('Statistics Suffix')
                        ->default('+')
                        ->columnSpan(2),

                    TextInput::make('stat_description')
                        ->label('Statistics Description')
                        ->default('Executive Workspace Solutions delivered for elite clients')
                        ->columnSpan(6),

                    Toggle::make('enable_sorting')
                        ->label('Enable Category Filtering')
                        ->default(true)
                        ->columnSpan(12),

                    Repeater::make('categories')
                        ->label('Filter Categories')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('name')
                                    ->label('Category Name')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('slug')
                                    ->label('Category Slug')
                                    ->required()
                                    ->columnSpan(6),
                            ]),
                        ])
                        ->defaultItems(4)
                        ->columnSpan(12)
                        ->collapsed(),

                    Repeater::make('items')
                        ->label('Portfolio Items')
                        ->schema([
                            Grid::make(12)->schema([
                                FileUpload::make('image')
                                    ->label('Portfolio Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/sections')
                                    ->imageEditor()
                                    ->required()
                                    ->columnSpan(12),

                                TextInput::make('title')
                                    ->label('Project Title')
                                    ->required()
                                    ->columnSpan(6),

                                Select::make('category')
                                    ->label('Category')
                                    ->options(Category::pluck('name', 'slug'))
                                    ->searchable()
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('category_label')
                                    ->label('Category Display Name')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('link')
                                    ->label('Project Link')
                                    ->url()
                                    ->default('#')
                                    ->columnSpan(6),
                            ]),
                        ])
                        ->defaultItems(8)
                        ->columnSpan(12)
                        ->collapsed(),
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

                                Select::make('category')
                                    ->label('Category')
                                    ->options(Category::pluck('name', 'slug'))
                                    ->searchable()
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

                                Select::make('category')
                                    ->label('Category')
                                    ->options(Category::pluck('name', 'slug'))
                                    ->searchable()
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
                    TextInput::make('title')
                        ->label('Title')
                        ->default('Hear from our distinguished members.')
                        ->columnSpan(6),

                    Textarea::make('description')
                        ->label('Description')
                        ->default('Industry leaders and successful entrepreneurs share their executive workspace experiences.')
                        ->rows(2)
                        ->columnSpan(6),

                    TextInput::make('rating')
                        ->label('Overall Rating')
                        ->numeric()
                        ->default('4.82')
                        ->columnSpan(6),

                    TextInput::make('total_reviews')
                        ->label('Total Reviews Text')
                        ->default('2,488 Rating')
                        ->columnSpan(6),

                    Repeater::make('testimonials')
                        ->label('Testimonials')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('author_name')
                                    ->label('Author Name')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('author_position')
                                    ->label('Author Position')
                                    ->columnSpan(6),

                                Select::make('rating')
                                    ->label('Rating')
                                    ->options([
                                        '1' => '1 Star',
                                        '2' => '2 Stars',
                                        '3' => '3 Stars',
                                        '4' => '4 Stars',
                                        '5' => '5 Stars',
                                    ])
                                    ->default('5')
                                    ->columnSpan(6),

                                FileUpload::make('author_image')
                                    ->label('Author Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/sections')
                                    ->imageEditor()
                                    ->columnSpan(6),

                                FileUpload::make('author_background_image')
                                    ->label('Author Background Image')
                                    ->helperText('Background image for the testimonial card')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/sections')
                                    ->imageEditor()
                                    ->columnSpan(12),

                                Textarea::make('content')
                                    ->label('Testimonial Content')
                                    ->required()
                                    ->rows(4)
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['author_name'] ?? 'Testimonial')
                        ->defaultItems(4),

                    Repeater::make('client_logos')
                        ->label('Client Logos')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('name')
                                    ->label('Client Name')
                                    ->columnSpan(6),

                                FileUpload::make('logo_color')
                                    ->label('Colored Logo')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/sections')
                                    ->imageEditor()
                                    ->columnSpan(6),

                                FileUpload::make('logo_white')
                                    ->label('White Logo')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/sections')
                                    ->imageEditor()
                                    ->columnSpan(6),

                                TextInput::make('link')
                                    ->label('Client Link (Optional)')
                                    ->url()
                                    ->columnSpan(6),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Client Logo')
                        ->defaultItems(6),
                ]),

            Block::make('testimonials_variation_2')
                ->label('Testimonials - Variation 2')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->columns(12)
                ->schema([
                    FileUpload::make('background_image')
                        ->label('Left Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('images/sections')
                        ->imageEditor()
                        ->columnSpan(6),

                    FileUpload::make('pattern_image')
                        ->label('Right Pattern Image')
                        ->image()
                        ->disk('public')
                        ->directory('images/sections')
                        ->imageEditor()
                        ->columnSpan(6),

                    TextInput::make('video_url')
                        ->label('Video URL')
                        ->url()
                        ->columnSpan(6),

                    TextInput::make('video_title')
                        ->label('Video Title')
                        ->default('Experience excellence')
                        ->columnSpan(6),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->default('Executive testimonials')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->default('Trusted by business leaders worldwide')
                        ->columnSpan(6),

                    TextInput::make('rating')
                        ->label('Overall Rating')
                        ->numeric()
                        ->default('4.82')
                        ->columnSpan(6),

                    TextInput::make('total_reviews')
                        ->label('Total Reviews')
                        ->default('3,247 Reviews')
                        ->columnSpan(6),

                    Repeater::make('testimonials')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('author_name')
                                    ->label('Author Name')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('author_position')
                                    ->label('Author Position')
                                    ->columnSpan(6),

                                Select::make('rating')
                                    ->label('Rating')
                                    ->options([
                                        '1' => '1 Star',
                                        '2' => '2 Stars',
                                        '3' => '3 Stars',
                                        '4' => '4 Stars',
                                        '5' => '5 Stars',
                                    ])
                                    ->default('5')
                                    ->columnSpan(12),

                                FileUpload::make('author_image')
                                    ->label('Author Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/sections')
                                    ->imageEditor()
                                    ->columnSpan(12),

                                Textarea::make('content')
                                    ->label('Testimonial Content')
                                    ->required()
                                    ->rows(4)
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['author_name'] ?? 'Testimonial')
                        ->defaultItems(3),
                ]),

            Block::make('process')
                ->label('Process Steps')
                ->columns(12)
                ->schema([
                    FileUpload::make('background_image')
                        ->label('Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('images/sections')
                        ->imageEditor()
                        ->columnSpan(12),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->maxLength(255)
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->maxLength(255)
                        ->columnSpan(6),

                    Repeater::make('steps')
                        ->label('Process Steps')
                        ->schema([
                            TextInput::make('number')
                                ->label('Step Number')
                                ->maxLength(50)
                                ->required()
                                ->columnSpan(3),

                            TextInput::make('title')
                                ->label('Step Title')
                                ->maxLength(255)
                                ->required()
                                ->columnSpan(9),

                            Textarea::make('description')
                                ->label('Step Description')
                                ->rows(3)
                                ->columnSpan(12),

                            FileUpload::make('image')
                                ->label('Step Image')
                                ->image()
                                ->disk('public')
                                ->directory('images/sections')
                                ->imageEditor()
                                ->required()
                                ->columnSpan(12),
                        ])
                        ->columns(12)
                        ->columnSpan(12)
                        ->defaultItems(4)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                ]),

            Block::make('process_variation_2')
                ->label('Process - Variation 2')
                ->icon('heroicon-o-arrow-path')
                ->columns(12)
                ->schema([
                    FileUpload::make('background_image')
                        ->label('Background Pattern Image')
                        ->image()
                        ->disk('public')
                        ->directory('images/sections')
                        ->imageEditor()
                        ->columnSpan(12),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->default('Excellence Since 1986')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->default('Our Executive Service Process')
                        ->columnSpan(6),

                    Repeater::make('steps')
                        ->label('Process Steps')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('number')
                                    ->label('Step Number')
                                    ->default('01')
                                    ->columnSpan(3),

                                TextInput::make('title')
                                    ->label('Step Title')
                                    ->required()
                                    ->columnSpan(9),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->required()
                                    ->rows(4)
                                    ->columnSpan(12),

                                FileUpload::make('image')
                                    ->label('Step Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/sections')
                                    ->imageEditor()
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Step')
                        ->defaultItems(4),
                ]),

            Block::make('history_timeline')
                ->label('Timeline')
                ->icon('heroicon-o-clock')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Section Title (Optional)')
                        ->columnSpan(12),

                    Repeater::make('events')
                        ->label('Timeline Events')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('year')
                                    ->label('Year')
                                    ->required()
                                    ->placeholder('2015')
                                    ->columnSpan(6),

                                TextInput::make('title')
                                    ->label('Event Title')
                                    ->required()
                                    ->placeholder('Our Foundation')
                                    ->columnSpan(6),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->required()
                                    ->rows(2)
                                    ->placeholder('Launch of premier executive workspace...')
                                    ->columnSpan(12),

                                FileUpload::make('image')
                                    ->label('Event Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/sections')
                                    ->imageEditor()
                                    ->required()
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => ($state['year'] ?? '').' - '.($state['title'] ?? 'Event'))
                        ->defaultItems(6)
                        ->minItems(1),
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
                ->label('Features Slider (Design Without Limits)')
                ->icon('heroicon-o-queue-list')
                ->columns(12)
                ->schema([
                    FileUpload::make('background_image')
                        ->label('Background Pattern Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(12),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Why Executive Professionals Choose Us')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Excellence without compromise, success guaranteed.')
                        ->helperText('Use <br> for line breaks if needed')
                        ->required()
                        ->columnSpan(6),

                    Select::make('columns')
                        ->label('Slider Columns')
                        ->options([
                            '2' => '2 Columns',
                            '3' => '3 Columns',
                            '4' => '4 Columns',
                            '5' => '5 Columns',
                        ])
                        ->default('4')
                        ->columnSpan(4),

                    Toggle::make('autoplay')
                        ->label('Enable Autoplay')
                        ->default(false)
                        ->columnSpan(4),

                    Toggle::make('loop')
                        ->label('Enable Loop')
                        ->default(true)
                        ->columnSpan(4),

                    Repeater::make('features')
                        ->label('Feature Slides')
                        ->schema([
                            Grid::make(12)->schema([
                                Select::make('icon')
                                    ->label('Icon')
                                    ->options(FlaticonList::getSelectOptions())
                                    ->searchable()
                                    ->required()
                                    ->default('pbmit-xinterio-icon-living-room')
                                    ->placeholder('Search and select an icon')
                                    ->columnSpan(12),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->placeholder('5 Years Premium Guarantee')
                                    ->required()
                                    ->columnSpan(9),

                                TextInput::make('number')
                                    ->label('Number')
                                    ->placeholder('01')
                                    ->columnSpan(3),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->placeholder('Our commitment to excellence ensures lasting quality...')
                                    ->rows(3)
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => ($state['number'] ?? '').($state['number'] && $state['title'] ? ' - ' : '').($state['title'] ?? 'Feature'))
                        ->defaultItems(5)
                        ->minItems(1),
                ]),

            Block::make('icon_box')
                ->label('Icon Box (The Advantages Of)')
                ->icon('heroicon-o-information-circle')
                ->columns(12)
                ->schema([
                    FileUpload::make('background_image')
                        ->label('Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(12),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Since 2015')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('The distinction of our executive platform.')
                        ->required()
                        ->columnSpan(6),

                    Textarea::make('description_1')
                        ->label('First Paragraph')
                        ->placeholder('Executive workspace leadership represents...')
                        ->rows(4)
                        ->columnSpan(12),

                    Textarea::make('description_2')
                        ->label('Second Paragraph (Optional)')
                        ->placeholder('Our portfolio encompasses...')
                        ->rows(4)
                        ->columnSpan(12),

                    FileUpload::make('signature_image')
                        ->label('Signature Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(12),
                ]),

            Block::make('icon_box_variation_2')
                ->label('Icon Box - Variation 2')
                ->columns(12)
                ->schema([
                    // Background Images
                    FileUpload::make('background_image')
                        ->label('Section Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->columnSpan(6),
                    FileUpload::make('left_background_image')
                        ->label('Left Box Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->columnSpan(6),

                    // Video Section
                    TextInput::make('video_url')
                        ->label('Video URL')
                        ->url()
                        ->placeholder('https://www.youtube.com/watch?v=...')
                        ->columnSpan(6),
                    TextInput::make('video_title')
                        ->label('Video Title')
                        ->placeholder('Watch our showcase')
                        ->columnSpan(6),
                    Select::make('video_icon')
                        ->label('Video Icon')
                        ->options(FlaticonList::getSelectOptions())
                        ->searchable()
                        ->required()
                        ->columnSpan(6)
                        ->default('pbmit-base-icon-play-button-1')
                        ->placeholder('Search and select an icon'),

                    // Content Section
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Since 2015')
                        ->columnSpan(6),
                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('The distinction of our executive environment.')
                        ->columnSpan(12),
                    Textarea::make('description_1')
                        ->label('First Paragraph')
                        ->rows(3)
                        ->columnSpan(12),
                    Textarea::make('description_2')
                        ->label('Second Paragraph')
                        ->rows(3)
                        ->columnSpan(12),
                    FileUpload::make('signature_image')
                        ->label('Signature Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->columnSpan(6),
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
                ->icon('heroicon-o-user-group')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->default('Excellence Redefined')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->default('Your Executive Journey')
                        ->columnSpan(6),

                    Repeater::make('members')
                        ->label('Team Members')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('number')
                                    ->label('Member Number')
                                    ->default('01')
                                    ->columnSpan(3),

                                TextInput::make('name')
                                    ->label('Name')
                                    ->required()
                                    ->columnSpan(9),

                                TextInput::make('position')
                                    ->label('Position')
                                    ->columnSpan(12),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(3)
                                    ->columnSpan(12),

                                FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/sections')
                                    ->imageEditor()
                                    ->columnSpan(6),

                                FileUpload::make('background_image')
                                    ->label('Background Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/sections')
                                    ->imageEditor()
                                    ->columnSpan(6),

                                TextInput::make('button_text')
                                    ->label('Button Text')
                                    ->default('Learn More')
                                    ->columnSpan(6),

                                TextInput::make('button_link')
                                    ->label('Button Link')
                                    ->default('#')
                                    ->columnSpan(6),

                                Repeater::make('social_links')
                                    ->label('Social Links')
                                    ->schema([
                                        Grid::make(12)->schema([
                                            Select::make('platform')
                                                ->label('Platform')
                                                ->options([
                                                    'facebook' => 'Facebook',
                                                    'twitter' => 'Twitter',
                                                    'linkedin' => 'LinkedIn',
                                                    'instagram' => 'Instagram',
                                                ])
                                                ->columnSpan(6),

                                            TextInput::make('url')
                                                ->label('URL')
                                                ->url()
                                                ->columnSpan(6),
                                        ]),
                                    ])
                                    ->columnSpan(12)
                                    ->collapsed()
                                    ->itemLabel(fn (array $state): ?string => $state['platform'] ?? 'Social Link'),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsed()
                        ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Member')
                        ->defaultItems(4),
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
                ->label('Before/After (We Design Thoughtful)')
                ->icon('heroicon-o-arrow-path')
                ->columns(12)
                ->schema([
                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('Since 2015')
                        ->columnSpan(6),

                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('We craft executive environments where leaders excel.')
                        ->required()
                        ->columnSpan(6),

                    Textarea::make('description')
                        ->label('Description')
                        ->placeholder('Empowering business professionals with premium workspace solutions...')
                        ->rows(3)
                        ->columnSpan(12),

                    Repeater::make('statistics')
                        ->label('Circular Statistics')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('percentage')
                                    ->label('Percentage Value')
                                    ->numeric()
                                    ->placeholder('87')
                                    ->required()
                                    ->minValue(0)
                                    ->maxValue(100)
                                    ->columnSpan(4),

                                TextInput::make('title')
                                    ->label('Statistic Title')
                                    ->placeholder('Executive Satisfaction')
                                    ->required()
                                    ->helperText('Use <br> for line breaks if needed')
                                    ->columnSpan(8),

                                TextInput::make('color')
                                    ->label('Circle Color (Hex)')
                                    ->placeholder('#bb9a65')
                                    ->default('#bb9a65')
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => ($state['percentage'] ?? '').'% - '.($state['title'] ?? 'Statistic'))
                        ->defaultItems(2)
                        ->minItems(1)
                        ->maxItems(2),

                    FileUpload::make('before_image')
                        ->label('Before Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->required()
                        ->columnSpan(6),

                    FileUpload::make('after_image')
                        ->label('After Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->required()
                        ->columnSpan(6),
                ]),

            Block::make('cta')
                ->label('Call to Action (We Making Home)')
                ->icon('heroicon-o-megaphone')
                ->columns(12)
                ->schema([
                    FileUpload::make('background_image')
                        ->label('Section Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('blocks')
                        ->imageEditor()
                        ->columnSpan(12),

                    Select::make('phone_icon')
                        ->label('Phone Icon')
                        ->options(FlaticonList::getSelectOptions())
                        ->searchable()
                        ->required()
                        ->default('pbmit-base-icon-phone-volume-solid-1')
                        ->placeholder('Search and select an icon')
                        ->columnSpan(6),

                    TextInput::make('phone')
                        ->label('Phone Number')
                        ->placeholder('+125-8845-5421')
                        ->required()
                        ->columnSpan(6),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->placeholder('EXCLUSIVE MEMBERSHIP OFFER')
                        ->required()
                        ->columnSpan(12),

                    TextInput::make('title_prefix')
                        ->label('Title Prefix (Before Rotating Words)')
                        ->placeholder('We create executive spaces so')
                        ->required()
                        ->columnSpan(6),

                    TextInput::make('title_suffix')
                        ->label('Title Suffix (After Rotating Words)')
                        ->placeholder("you'll elevate your business")
                        ->required()
                        ->columnSpan(6),

                    Repeater::make('rotating_words')
                        ->label('Rotating Words')
                        ->schema([
                            Grid::make(12)->schema([
                                TextInput::make('word')
                                    ->label('Word')
                                    ->required()
                                    ->placeholder('distinguished')
                                    ->columnSpan(12),
                            ]),
                        ])
                        ->columnSpan(12)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['word'] ?? 'Word')
                        ->defaultItems(4)
                        ->minItems(1),

                    TextInput::make('badge_text')
                        ->label('Badge Text')
                        ->placeholder('Premium Access')
                        ->required()
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
                ->label('Dynamic Content Grid (Legacy)')
                ->icon('heroicon-o-calendar')
                ->columns(12)
                ->schema([
                    Select::make('content_type')
                        ->label('Content Type')
                        ->options([
                            'posts' => 'Posts',
                            'events' => 'Events',
                            'services' => 'Services',
                        ])
                        ->default('events')
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
                ]),
        ];
    }
}

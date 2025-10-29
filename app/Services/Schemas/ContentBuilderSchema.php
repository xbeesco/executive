<?php

namespace App\Services\Schemas;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

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
                        ]),
                ]),

            Block::make('content_image')
                ->label('Image')
                ->icon('heroicon-o-photo')
                ->schema([
                    FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->disk('public')
                        ->directory('images/content')
                        ->imageEditor()
                        ->required(),

                    TextInput::make('alt_text')
                        ->label('Alt Text')
                        ->maxLength(255),

                    TextInput::make('caption')
                        ->label('Caption')
                        ->maxLength(255),

                    Select::make('alignment')
                        ->label('Alignment')
                        ->options([
                            'text-start' => 'Left',
                            'text-center' => 'Center',
                            'text-end' => 'Right',
                        ])
                        ->default('text-center'),

                    Select::make('size')
                        ->label('Size')
                        ->options([
                            'w-100' => 'Full Width',
                            'w-75' => '75%',
                            'w-50' => '50%',
                            'w-25' => '25%',
                        ])
                        ->default('w-100'),
                ]),

            Block::make('content_gallery')
                ->label('Image Gallery')
                ->icon('heroicon-o-photo')
                ->schema([
                    Repeater::make('images')
                        ->label('Images')
                        ->schema([
                            FileUpload::make('image')
                                ->label('Image')
                                ->image()
                                ->disk('public')
                                ->directory('images/gallery')
                                ->imageEditor()
                                ->required(),

                            TextInput::make('alt_text')
                                ->label('Alt Text'),

                            TextInput::make('caption')
                                ->label('Caption'),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['caption'] ?? null),

                    Select::make('columns')
                        ->label('Columns per Row')
                        ->options([
                            '12' => '1 Column',
                            '6' => '2 Columns',
                            '4' => '3 Columns',
                            '3' => '4 Columns',
                        ])
                        ->default('4'),
                ]),

            Block::make('content_list')
                ->label('List')
                ->icon('heroicon-o-list-bullet')
                ->schema([
                    Select::make('list_type')
                        ->label('List Type')
                        ->options([
                            'unordered' => 'Bullet List',
                            'ordered' => 'Numbered List',
                        ])
                        ->default('unordered')
                        ->required(),

                    Select::make('list_style')
                        ->label('List Style')
                        ->options([
                            'default' => 'Default',
                            'unstyled' => 'No Markers',
                        ])
                        ->default('default'),

                    Repeater::make('items')
                        ->label('List Items')
                        ->schema([
                            TextInput::make('text')
                                ->label('Item Text')
                                ->required(),

                            TextInput::make('icon')
                                ->label('Icon Class (Optional)')
                                ->helperText('FontAwesome or Bootstrap icon class'),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? null)
                        ->required()
                        ->minItems(1),
                ]),

            Block::make('content_quote')
                ->label('Quote')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->schema([
                    Textarea::make('quote')
                        ->label('Quote Text')
                        ->required()
                        ->rows(3),

                    TextInput::make('author')
                        ->label('Author Name'),

                    TextInput::make('author_title')
                        ->label('Author Title/Position'),
                ]),

            Block::make('content_accordion')
                ->label('Accordion (Simple)')
                ->icon('heroicon-o-bars-3-bottom-left')
                ->schema([
                    Repeater::make('items')
                        ->label('Accordion Items')
                        ->schema([
                            TextInput::make('title')
                                ->label('Title')
                                ->required(),

                            TextInput::make('icon')
                                ->label('Icon Class (Optional)')
                                ->helperText('FontAwesome or Bootstrap icon class'),

                            RichEditor::make('content')
                                ->label('Content')
                                ->required()
                                ->toolbarButtons([
                                    'bold',
                                    'bulletList',
                                    'italic',
                                    'link',
                                    'orderedList',
                                ]),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                        ->required()
                        ->minItems(1),
                ]),

            Block::make('content_video')
                ->label('Video')
                ->icon('heroicon-o-video-camera')
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
                        ->reactive(),

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
                        }),

                    TextInput::make('title')
                        ->label('Video Title'),

                    TextInput::make('caption')
                        ->label('Caption'),
                ]),

            Block::make('content_divider')
                ->label('Divider')
                ->icon('heroicon-o-minus')
                ->schema([
                    Select::make('style')
                        ->label('Line Style')
                        ->options([
                            'solid' => 'Solid',
                            'dashed' => 'Dashed',
                            'dotted' => 'Dotted',
                        ])
                        ->default('solid'),

                    Select::make('color')
                        ->label('Color')
                        ->options([
                            'primary' => 'Primary',
                            'secondary' => 'Secondary',
                            'dark' => 'Dark',
                            'light' => 'Light',
                        ])
                        ->default('secondary'),

                    TextInput::make('thickness')
                        ->label('Thickness (px)')
                        ->numeric()
                        ->default(1)
                        ->minValue(1)
                        ->maxValue(10),

                    TextInput::make('width')
                        ->label('Width (%)')
                        ->numeric()
                        ->default(100)
                        ->minValue(10)
                        ->maxValue(100),

                    TextInput::make('opacity')
                        ->label('Opacity')
                        ->numeric()
                        ->default(25)
                        ->minValue(10)
                        ->maxValue(100),

                    TextInput::make('text')
                        ->label('Text (Optional)')
                        ->helperText('Text to display in the middle of divider'),
                ]),

            Block::make('spacer')
                ->label('Spacer')
                ->icon('heroicon-o-arrows-up-down')
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
                        ->selectablePlaceholder(false),
                ]),

            // === PAGE SECTION BLOCKS ===

            Block::make('hero')
                ->label('Hero Section')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('subtitle'),
                    FileUpload::make('background_image')->image()->disk('public')->directory('blocks'),
                    TextInput::make('button_text'),
                    TextInput::make('button_url'),
                ]),

            Block::make('slider')
                ->label('Slider')
                ->icon('heroicon-o-arrows-right-left')
                ->schema([
                    TextInput::make('title')->label('Section Title'),
                    Repeater::make('slides')
                        ->label('Slider Items')
                        ->schema([
                            FileUpload::make('icon')->image()->disk('public')->directory('blocks'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2)
                        ->defaultItems(4),
                ]),

            Block::make('about')
                ->label('About Section')
                ->icon('heroicon-o-information-circle')
                ->schema([
                    TextInput::make('subtitle'),
                    TextInput::make('title')->required(),
                    RichEditor::make('content'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                    Repeater::make('features')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('text'),
                        ])
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('about_variation_2')
                ->label('About - Variation 2')
                ->icon('heroicon-o-information-circle')
                ->schema([
                    TextInput::make('subtitle'),
                    TextInput::make('title'),
                    RichEditor::make('content'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                    Repeater::make('features')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('text'),
                        ])
                        ->columns(2),
                ]),

            Block::make('about_variation_3')
                ->label('About - Variation 3')
                ->icon('heroicon-o-information-circle')
                ->schema([
                    TextInput::make('subtitle'),
                    TextInput::make('title'),
                    RichEditor::make('content'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                    Repeater::make('list_items')
                        ->schema([
                            TextInput::make('text'),
                            TextInput::make('icon'),
                        ])
                        ->columns(2)
                        ->defaultItems(4),
                ]),

            Block::make('about_variation_4')
                ->label('About - Variation 4')
                ->icon('heroicon-o-information-circle')
                ->schema([
                    TextInput::make('subtitle'),
                    TextInput::make('title'),
                    RichEditor::make('content'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                    Repeater::make('features')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('text'),
                        ])
                        ->columns(2)
                        ->defaultItems(3),
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
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('services_grid_variation_2')
                ->label('Services Grid - Variation 2')
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
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('services_grid_variation_3')
                ->label('Services Grid - Variation 3')
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
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('services_grid_variation_4')
                ->label('Services Grid - Variation 4')
                ->icon('heroicon-o-squares-2x2')
                ->schema([
                    TextInput::make('title'),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3),
                    Repeater::make('services')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2)
                        ->defaultItems(3),
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
                        ])
                        ->defaultItems(3),
                ]),

            Block::make('services')
                ->label('Services Section')
                ->icon('heroicon-o-briefcase')
                ->schema([
                    TextInput::make('title')->required(),
                    RichEditor::make('content'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                    TextInput::make('button_text'),
                    TextInput::make('button_url'),
                ]),

            Block::make('services_variation_2')
                ->label('Services - Variation 2')
                ->icon('heroicon-o-briefcase')
                ->schema([
                    TextInput::make('title'),
                    RichEditor::make('content'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                ]),

            Block::make('services_variation_3')
                ->label('Services - Variation 3')
                ->icon('heroicon-o-briefcase')
                ->schema([
                    TextInput::make('title'),
                    RichEditor::make('content'),
                    Repeater::make('services')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('pricing_table')
                ->label('Pricing Table')
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
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('pricing_variation_2')
                ->label('Pricing - Variation 2')
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
                                ]),
                            TextInput::make('button_text')->default('Get Started'),
                            Toggle::make('featured')->default(false),
                        ])
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('pricing_variation_3')
                ->label('Pricing - Variation 3')
                ->icon('heroicon-o-currency-dollar')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('plans')
                        ->schema([
                            TextInput::make('name'),
                            TextInput::make('price'),
                            Repeater::make('features')
                                ->schema([
                                    TextInput::make('text'),
                                    Toggle::make('included')->default(true),
                                ]),
                            TextInput::make('button_text')->default('Choose Plan'),
                        ])
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('pricing_variation_4')
                ->label('Pricing - Variation 4')
                ->icon('heroicon-o-currency-dollar')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('plans')
                        ->schema([
                            TextInput::make('name'),
                            TextInput::make('price'),
                            Repeater::make('features')
                                ->schema([
                                    TextInput::make('text'),
                                    Toggle::make('included')->default(true),
                                ]),
                            TextInput::make('button_text')->default('Get Started'),
                        ])
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('portfolio_grid')
                ->label('Portfolio Grid')
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
                        ->columns(2)
                        ->defaultItems(6),
                ]),

            Block::make('portfolio_variation_2')
                ->label('Portfolio - Variation 2')
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
                        ])
                        ->columns(2)
                        ->defaultItems(6),
                ]),

            Block::make('portfolio_variation_3')
                ->label('Portfolio - Variation 3')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title'),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3),
                    Repeater::make('items')
                        ->schema([
                            TextInput::make('title'),
                            TextInput::make('category'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(6),
                ]),

            Block::make('portfolio_variation_4')
                ->label('Portfolio - Variation 4')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title'),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3),
                    Repeater::make('items')
                        ->schema([
                            TextInput::make('title'),
                            TextInput::make('category'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(6),
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
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('testimonials_variation_2')
                ->label('Testimonials - Variation 2')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->schema([
                    TextInput::make('title'),
                    Textarea::make('description'),
                    Repeater::make('testimonials')
                        ->schema([
                            TextInput::make('author_name'),
                            TextInput::make('author_position'),
                            FileUpload::make('author_image')->image()->disk('public')->directory('blocks'),
                            Textarea::make('content'),
                            Select::make('rating')->options([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'])->default(5),
                        ])
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('process')
                ->label('Process Steps')
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
                        ->columns(2)
                        ->defaultItems(4),
                ]),

            Block::make('process_variation_2')
                ->label('Process - Variation 2')
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
                        ->columns(2)
                        ->defaultItems(4),
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
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(5),
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
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(4),
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
                        ])
                        ->defaultItems(4),
                ]),

            Block::make('icon_box')
                ->label('Icon Box')
                ->icon('heroicon-o-cube')
                ->schema([
                    TextInput::make('title'),
                    Textarea::make('description'),
                    TextInput::make('icon'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                    Repeater::make('features')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2)
                        ->defaultItems(4),
                ]),

            Block::make('icon_box_variation_2')
                ->label('Icon Box - Variation 2')
                ->icon('heroicon-o-cube')
                ->schema([
                    TextInput::make('title'),
                    Textarea::make('description'),
                    Repeater::make('advantages')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            Block::make('accordion')
                ->label('Accordion (Rich)')
                ->icon('heroicon-o-bars-3-bottom-right')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('items')
                        ->schema([
                            TextInput::make('question'),
                            RichEditor::make('answer'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(3),
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
                        ])
                        ->defaultItems(3),
                ]),

            Block::make('team')
                ->label('Team Members')
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
                        ->columns(2)
                        ->defaultItems(3),
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
                        ->columns(2)
                        ->defaultItems(4),
                ]),

            Block::make('clients_logos')
                ->label('Clients Logos')
                ->icon('heroicon-o-building-office-2')
                ->schema([
                    TextInput::make('title'),
                    Textarea::make('description'),
                    Repeater::make('clients')
                        ->schema([
                            TextInput::make('name'),
                            FileUpload::make('logo')->image()->disk('public')->directory('blocks'),
                            TextInput::make('url'),
                        ])
                        ->columns(2)
                        ->defaultItems(6),
                ]),

            Block::make('before_after')
                ->label('Before/After')
                ->icon('heroicon-o-arrows-right-left')
                ->schema([
                    TextInput::make('title'),
                    FileUpload::make('before_image')->image()->disk('public')->directory('blocks'),
                    FileUpload::make('after_image')->image()->disk('public')->directory('blocks'),
                    Textarea::make('description'),
                ]),

            Block::make('cta')
                ->label('Call to Action')
                ->icon('heroicon-o-megaphone')
                ->schema([
                    TextInput::make('subtitle'),
                    TextInput::make('title'),
                    TextInput::make('phone'),
                    TextInput::make('phone_icon'),
                    TextInput::make('badge_text'),
                    Repeater::make('rotating_words')
                        ->label('Rotating Words')
                        ->schema([
                            TextInput::make('word'),
                        ])
                        ->defaultItems(4),
                ]),

            Block::make('static')
                ->label('Static Content (Homepage-1)')
                ->icon('heroicon-o-document-text')
                ->schema([
                    TextInput::make('note')
                        ->label('Note')
                        ->default('This is a static block containing About + Statistics sections from homepage-1.html')
                        ->disabled(),
                ]),

            Block::make('posts_grid')
                ->label('Posts Grid (Sortable)')
                ->icon('heroicon-o-document-text')
                ->schema([
                    TextInput::make('title')
                        ->label('Section Title')
                        ->placeholder('Optional section title'),
                    Select::make('columns')
                        ->label('Columns')
                        ->options([2 => '2', 3 => '3', 4 => '4'])
                        ->default(3),
                    Toggle::make('show_sortable')
                        ->label('Show Category Filter')
                        ->default(true),
                ]),

            Block::make('events_grid')
                ->label('Events Grid')
                ->icon('heroicon-o-calendar')
                ->schema([
                    TextInput::make('title')
                        ->label('Section Title')
                        ->placeholder('Optional section title'),
                    Select::make('columns')
                        ->label('Columns')
                        ->options([2 => '2', 3 => '3', 4 => '4'])
                        ->default(3),
                ]),
        ];
    }
}

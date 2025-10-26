<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class SectionsBlocks
{
    public static function get(): array
    {
        return [
            // ═══════════════════════════════════════════════════════════
            // SECTION 1: Basic Elements (23 blocks)
            // Names & Icons from PageForm.php + Schema from PageBuilderBlocks.php
            // ═══════════════════════════════════════════════════════════

            // 1. Hero Section
            Block::make('hero')
                ->label('Hero')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title')->required(),
                    Textarea::make('subtitle'),
                    FileUpload::make('background_image')->image()->disk('public')->directory('blocks'),
                    TextInput::make('button_text'),
                    TextInput::make('button_url'),
                ]),

            // 2. Slider Section
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

            // 3. About Section
            Block::make('about')
                ->label('About')
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

            // 4. Services Grid
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

            // 5. Services Slider
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

            // 6. Services
            Block::make('services')
                ->label('Services')
                ->icon('heroicon-o-briefcase')
                ->schema([
                    TextInput::make('title')->required(),
                    RichEditor::make('content'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                    TextInput::make('button_text'),
                    TextInput::make('button_url'),
                ]),

            // 7. Pricing Table
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
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            // 8. Portfolio Grid
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
                        ->columns(2)
                        ->defaultItems(6),
                ]),

            // 9. Testimonials
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

            // 10. Process
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
                        ->columns(2)
                        ->defaultItems(4),
                ]),

            // 11. History Timeline
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

            // 12. Features Grid
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

            // 13. Features Slider
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

            // 14. Icon Box
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

            // 15. Accordion
            Block::make('accordion')
                ->label('Accordion')
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

            // 16. Tabs
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

            // 17. Team
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
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            // 18. Awards
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

            // 19. Clients Logos
            Block::make('clients_logos')
                ->label('Clients')
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

            // 20. Before/After
            Block::make('before_after')
                ->label('Before/After')
                ->icon('heroicon-o-arrows-right-left')
                ->schema([
                    TextInput::make('title'),
                    FileUpload::make('before_image')->image()->disk('public')->directory('blocks'),
                    FileUpload::make('after_image')->image()->disk('public')->directory('blocks'),
                    Textarea::make('description'),
                ]),

            // 21. Text
            Block::make('text')
                ->label('Text')
                ->icon('heroicon-o-document-text')
                ->schema([
                    RichEditor::make('content')->required(),
                ]),

            // 22. Image
            Block::make('image')
                ->label('Image')
                ->icon('heroicon-o-photo')
                ->schema([
                    FileUpload::make('image')->image()->disk('public')->directory('blocks')->required(),
                    TextInput::make('caption'),
                    TextInput::make('alt'),
                ]),

            // 23. Archive Grid
            Block::make('archive_grid')
                ->label('Archive')
                ->icon('heroicon-o-bars-3')
                ->schema([
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3),
                    TextInput::make('per_page')->numeric()->default(12),
                ]),

            // ═══════════════════════════════════════════════════════════
            // SECTION 2: Additional Variations (18 blocks)
            // From PageBuilderBlocks.php - Not used in basic list
            // ═══════════════════════════════════════════════════════════

            // About Variations
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

            // Services Grid Variations
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

            // Services Variations
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

            // Portfolio Variations
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

            // Testimonials Variation
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

            // Process Variation
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

            // Pricing Variations
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

            // Icon Box Variation
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

            // CTA Section (New - Unique)
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
        ];
    }
}

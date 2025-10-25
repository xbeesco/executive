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

class PageBuilderBlocks
{
    public static function get(): array
    {
        return [
            // Database Page 1 - Section 1
            Block::make('about-modern-living-area')
                ->label('Modern Living Area Slider')
                ->icon('heroicon-o-arrows-right-left')
                ->schema([
                    TextInput::make('title')->label('Section Title')->default('Modern Living Area'),
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

            // Database Page 1 - Section 2
            Block::make('pricing-creating-the-art-of')
                ->label('Creating the Art of - Accordion')
                ->icon('heroicon-o-bars-3-bottom-right')
                ->schema([
                    TextInput::make('title')->label('Section Title')->default('Creating the art of'),
                    Repeater::make('items')
                        ->label('Accordion Items')
                        ->schema([
                            TextInput::make('question'),
                            RichEditor::make('answer'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->columns(2)
                        ->defaultItems(3),
                ]),

            // Database Page 1 - Section 3
            Block::make('testimonials-hear-from-clients')
                ->label('Hear from Clients - Testimonials')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->schema([
                    TextInput::make('title')->default('Hear from clients.'),
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

            // Database Page 1 - Section 4
            Block::make('about-start-your-healthy-life')
                ->label('Start Your Healthy Life - About')
                ->icon('heroicon-o-information-circle')
                ->schema([
                    TextInput::make('subtitle')->default('About Us'),
                    TextInput::make('title')->default('Start your healthy life'),
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

            // Database Page 1 - Section 5
            Block::make('pricing-different-case')
                ->label('Different Case - Services Grid')
                ->icon('heroicon-o-squares-2x2')
                ->schema([
                    TextInput::make('subtitle')->default('Our Services'),
                    TextInput::make('title')->default('Different case,'),
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

            // Database Page 1 - Section 6
            Block::make('services-what-can-we-offer')
                ->label('What Can We Offer - Tabs')
                ->icon('heroicon-o-folder-open')
                ->schema([
                    TextInput::make('title')->default('What Can We Offer'),
                    Repeater::make('tabs')
                        ->schema([
                            TextInput::make('label'),
                            RichEditor::make('content'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->defaultItems(3),
                ]),

            // Database Page 1 - Section 7
            Block::make('section-we-design-thoughtful')
                ->label('We Design Thoughtful - Before/After')
                ->icon('heroicon-o-arrows-right-left')
                ->schema([
                    TextInput::make('title')->default('We design thoughtful'),
                    FileUpload::make('before_image')->image()->disk('public')->directory('blocks'),
                    FileUpload::make('after_image')->image()->disk('public')->directory('blocks'),
                    Textarea::make('description'),
                ]),

            // Database Page 1 - Section 8
            Block::make('about-transforming-dull')
                ->label('Transforming Dull - About')
                ->icon('heroicon-o-information-circle')
                ->schema([
                    TextInput::make('subtitle')->default('About'),
                    TextInput::make('title')->default('Transforming dull'),
                    RichEditor::make('content'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                    Repeater::make('features')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('text'),
                        ])
                        ->columns(2),
                ]),

            // Database Page 1 - Section 9
            Block::make('pricing-what-we-offer-for')
                ->label('What We Offer For - Services Slider')
                ->icon('heroicon-o-queue-list')
                ->schema([
                    TextInput::make('title')->default('What we offer for you'),
                    Repeater::make('services')
                        ->schema([
                            TextInput::make('title'),
                            Textarea::make('description'),
                            FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                        ])
                        ->defaultItems(3),
                ]),

            // Database Page 1 - Section 10
            Block::make('services-get-amazing-cleaning')
                ->label('Get Amazing Cleaning - Process')
                ->icon('heroicon-o-arrow-path')
                ->schema([
                    TextInput::make('title')->default('Get amazing cleaning'),
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

            // Database Page 1 - Section 11
            Block::make('portfolio-see-our-latest-case')
                ->label('See Our Latest Case - Portfolio')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title')->default('See our latest case studies'),
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

            // Database Page 1 - Section 12
            Block::make('pricing-design-without-limits')
                ->label('Design Without Limits - Features Slider')
                ->icon('heroicon-o-star')
                ->schema([
                    TextInput::make('title')->default('Design without limits'),
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(4),
                    Repeater::make('features')
                        ->schema([
                            TextInput::make('icon'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                        ->defaultItems(4),
                ]),

            // Database Page 1 - Section 13
            Block::make('testimonials-heres-what-our')
                ->label('Here\'s What Our - Testimonials')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->schema([
                    TextInput::make('title')->default('Here\'s what our'),
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

            // Database Page 2 - Section 1
            Block::make('pricing-creating-the')
                ->label('Creating The - Services Grid')
                ->icon('heroicon-o-squares-2x2')
                ->schema([
                    TextInput::make('subtitle'),
                    TextInput::make('title')->default('Creating the'),
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

            // Database Page 2 - Section 2
            Block::make('about-the-advantages-of-our')
                ->label('The Advantages Of Our - Icon Box')
                ->icon('heroicon-o-cube')
                ->schema([
                    TextInput::make('title')->default('The advantages of our'),
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

            // Database Page 2 - Section 3
            Block::make('portfolio-minimalism')
                ->label('Minimalism - Portfolio Grid')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title')->default('minimalism'),
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

            // Database Page 2 - Section 4
            Block::make('process-how-organization-works')
                ->label('How Organization Works - Process')
                ->icon('heroicon-o-arrow-path')
                ->schema([
                    TextInput::make('title')->default('How organization works'),
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

            // Database Page 2 - Section 5 (NEW - Missing Section)
            Block::make('cta-we-making-home')
                ->label('We Making Home - CTA Offer')
                ->icon('heroicon-o-megaphone')
                ->schema([
                    TextInput::make('subtitle')->default('LIMITED PERIOD OFFER'),
                    TextInput::make('title')->default('We Making home so beautiful, attractive, gorgeous, appealing'),
                    TextInput::make('phone')->default('+125-8845-5421'),
                    TextInput::make('phone_icon')->default('pbmit-base-icon-phone-volume-solid-1'),
                    TextInput::make('badge_text')->default('New Offer'),
                    Repeater::make('rotating_words')
                        ->label('Rotating Words')
                        ->schema([
                            TextInput::make('word'),
                        ])
                        ->defaultItems(4)
                        ->default([
                            ['word' => 'beautiful'],
                            ['word' => 'attractive'],
                            ['word' => 'gorgeous'],
                            ['word' => 'appealing'],
                        ]),
                ]),

            // Database Page 2 - Section 6
            Block::make('pricing-the-best-pricing')
                ->label('The Best Pricing - Pricing Table')
                ->icon('heroicon-o-currency-dollar')
                ->schema([
                    TextInput::make('title')->default('The best pricing'),
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

            // Database Page 2 - Section 7
            Block::make('pricing-making-your-home')
                ->label('Making Your Home - Services')
                ->icon('heroicon-o-briefcase')
                ->schema([
                    TextInput::make('title')->default('Making your home'),
                    RichEditor::make('content'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                    TextInput::make('button_text')->default('Learn More'),
                    TextInput::make('button_url'),
                ]),

            // Database Page 2 - Section 8
            Block::make('portfolio-see-our-latest-case-2')
                ->label('See Our Latest Case 2 - Portfolio')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title')->default('See Our Latest Case Studies'),
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

            // Database Page 2 - Section 9
            Block::make('awards-award-achievement')
                ->label('Award & Achievement - Awards')
                ->icon('heroicon-o-trophy')
                ->schema([
                    TextInput::make('title')->default('Award & achievement'),
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

            // Database Page 2 - Section 10
            Block::make('pricing-choose-plan-for')
                ->label('Choose Plan For - Pricing Table')
                ->icon('heroicon-o-currency-dollar')
                ->schema([
                    TextInput::make('title')->default('Choose plan for'),
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

            // Database Page 2 - Section 11
            Block::make('about-we-design-thoughtful')
                ->label('We Design Thoughtful - About')
                ->icon('heroicon-o-information-circle')
                ->schema([
                    TextInput::make('subtitle'),
                    TextInput::make('title')->default('We design thoughtful'),
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

            // Database Page 2 - Section 12
            Block::make('pricing-choose-plan-for-house')
                ->label('Choose Plan For House - Pricing Table')
                ->icon('heroicon-o-currency-dollar')
                ->schema([
                    TextInput::make('title')->default('Choose plan for house'),
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

            // Database Page 2 - Section 13
            Block::make('about-our-beginning')
                ->label('Our Beginning - History Timeline')
                ->icon('heroicon-o-clock')
                ->schema([
                    TextInput::make('title')->default('our beginning'),
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

            // Database Page 3 - Section 1
            Block::make('about-exceptional-designing')
                ->label('Exceptional Designing - About')
                ->icon('heroicon-o-information-circle')
                ->schema([
                    TextInput::make('subtitle'),
                    TextInput::make('title')->default('Exceptional designing'),
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

            // Database Page 3 - Section 2
            Block::make('pricing-what-we-offer-for-2')
                ->label('What We Offer For 2 - Services Grid')
                ->icon('heroicon-o-squares-2x2')
                ->schema([
                    TextInput::make('subtitle'),
                    TextInput::make('title')->default('What We Offer For You'),
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

            // Database Page 3 - Section 3
            Block::make('pricing-why-choose')
                ->label('Why Choose - Features Grid')
                ->icon('heroicon-o-star')
                ->schema([
                    TextInput::make('title')->default('Why Choose'),
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

            // Database Page 3 - Section 4
            Block::make('pricing-examination-package')
                ->label('Examination Package - Pricing Table')
                ->icon('heroicon-o-currency-dollar')
                ->schema([
                    TextInput::make('title')->default('Examination Package'),
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

            // Database Page 3 - Section 5
            Block::make('faq-transforming-dull-spaces')
                ->label('Transforming Dull Spaces - Hero')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title')->default('Transforming dull spaces'),
                    Textarea::make('subtitle'),
                    FileUpload::make('background_image')->image()->disk('public')->directory('blocks'),
                    TextInput::make('button_text')->default('Get Started'),
                    TextInput::make('button_url'),
                ]),

            // Database Page 3 - Section 6
            Block::make('pricing-thoughtful-livable-spaces-design')
                ->label('Thoughtful Livable Spaces - Services')
                ->icon('heroicon-o-briefcase')
                ->schema([
                    TextInput::make('title')->default('Thoughtful livable spaces design'),
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

            // Database Page 3 - Section 7
            Block::make('portfolio-selected-case')
                ->label('Selected Case - Portfolio Grid')
                ->icon('heroicon-o-photo')
                ->schema([
                    TextInput::make('title')->default('Selected Case'),
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

            // Database Page 3 - Section 8
            Block::make('section-join-the-companies-that')
                ->label('Join the Companies - Clients Logos')
                ->icon('heroicon-o-building-office-2')
                ->schema([
                    TextInput::make('title')->default('Join the companies that trust'),
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

            // Database Page 3 - Section 9
            Block::make('pricing-we-design')
                ->label('We Design - Services')
                ->icon('heroicon-o-briefcase')
                ->schema([
                    TextInput::make('title')->default('We design'),
                    RichEditor::make('content'),
                    FileUpload::make('image')->image()->disk('public')->directory('blocks'),
                ]),

            // Database Page 3 - Section 10
            Block::make('pricing-what-can-we-offer')
                ->label('What Can We Offer - Services Grid')
                ->icon('heroicon-o-squares-2x2')
                ->schema([
                    TextInput::make('title')->default('What Can We Offer'),
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

            // Database Page 3 - Section 11
            Block::make('team-meet-designer')
                ->label('Meet Designer - Team')
                ->icon('heroicon-o-user-group')
                ->schema([
                    TextInput::make('title')->default('meet designer'),
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

            // Database Page 3 - Section 12
            Block::make('about-the-advantages-of')
                ->label('The Advantages Of - Icon Box')
                ->icon('heroicon-o-cube')
                ->schema([
                    TextInput::make('title')->default('The advantages of'),
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

            // Basic Blocks
            Block::make('text')
                ->label('Text Content')
                ->icon('heroicon-o-document-text')
                ->schema([
                    RichEditor::make('content')->required(),
                ]),

            Block::make('image')
                ->label('Image')
                ->icon('heroicon-o-photo')
                ->schema([
                    FileUpload::make('image')->image()->disk('public')->directory('blocks')->required(),
                    TextInput::make('caption'),
                    TextInput::make('alt'),
                ]),

            Block::make('archive_grid')
                ->label('Archive/Blog Grid')
                ->icon('heroicon-o-bars-3')
                ->schema([
                    Select::make('columns')->options([2 => '2', 3 => '3', 4 => '4'])->default(3),
                    TextInput::make('per_page')->numeric()->default(12),
                ]),
        ];
    }
}

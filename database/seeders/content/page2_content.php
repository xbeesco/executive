<?php

// Database Page 2: Elite Business Sanctuary
// Based on sections.md - 13 sections total

return [
    // 1. "Creating the" → pricing-creating-the (services_grid)
    [
        'type' => 'services_grid_variation_2',
        'data' => [
            'subtitle' => 'Comprehensive Solutions',
            'title' => 'Creating the Foundation for Excellence',
            'columns' => 3,
            'services' => [
                [
                    'icon' => 'flaticon-strategy',
                    'title' => 'Strategic Planning Rooms',
                    'description' => 'Confidential war rooms equipped with 85-inch interactive displays, encrypted secure communication systems, and ergonomic executive seating for extended strategic sessions and confidential board meetings.',
                ],
                [
                    'icon' => 'flaticon-presentation',
                    'title' => 'Presentation Theaters',
                    'description' => 'Cinema-quality auditoriums with tiered seating for 20-100 distinguished attendees, perfect for investor presentations, product unveilings, and shareholder meetings with professional AV production.',
                ],
                [
                    'icon' => 'flaticon-collaboration',
                    'title' => 'Collaboration Lounges',
                    'description' => 'Informal yet refined spaces with modular Italian furniture, 75-inch digital whiteboards, and premium refreshment stations for creative brainstorming and innovation workshops.',
                ],
            ],
        ],
    ],

    // 2. "The advantages of our" → about-the-advantages-of-our (icon_box)
    [
        'type' => 'icon_box',
        'data' => [
            'title' => 'The Advantages of Our Distinguished Approach',
            'description' => 'We deliver more than workspace—we provide a comprehensive ecosystem designed to amplify your success and elevate your professional experience to unprecedented levels.',
            'icon' => 'flaticon-excellence',
            'image' => 'blocks/advantages-distinguished-approach.jpg',
            'features' => [
                [
                    'icon' => 'flaticon-reputation',
                    'title' => 'Prestigious Address',
                    'description' => 'Establish your business at globally recognized addresses that resonate with success and substantially enhance your corporate identity and market positioning.',
                ],
                [
                    'icon' => 'flaticon-network',
                    'title' => 'Elite Network Access',
                    'description' => 'Connect with Fortune 500 C-suite executives, venture capital investors, and industry thought leaders through curated networking opportunities and exclusive events.',
                ],
                [
                    'icon' => 'flaticon-service',
                    'title' => 'Unmatched Service',
                    'description' => 'Experience hospitality standards typically reserved for five-star hotels and exclusive private clubs, delivered with exceptional attention to your preferences.',
                ],
                [
                    'icon' => 'flaticon-efficiency',
                    'title' => 'Operational Excellence',
                    'description' => 'Focus exclusively on growing your business while we handle every operational detail with precision, discretion, and unwavering commitment to excellence.',
                ],
            ],
        ],
    ],

    // 3. "minimalism" → portfolio-minimalism (portfolio_grid)
    [
        'type' => 'portfolio_variation_2',
        'data' => [
            'title' => 'Minimalism Meets Opulence',
            'columns' => 3,
            'sortable' => true,
            'items' => [
                [
                    'title' => 'Zen Executive Office',
                    'category' => 'Minimalist Design',
                    'image' => 'blocks/design-zen-executive.jpg',
                ],
                [
                    'title' => 'Modern Boardroom Sanctuary',
                    'category' => 'Contemporary',
                    'image' => 'blocks/design-modern-boardroom.jpg',
                ],
                [
                    'title' => 'Scandinavian Suite',
                    'category' => 'Nordic Luxury',
                    'image' => 'blocks/design-scandinavian-luxury.jpg',
                ],
                [
                    'title' => 'Japanese Inspired Space',
                    'category' => 'Eastern Elegance',
                    'image' => 'blocks/design-japanese-inspired.jpg',
                ],
                [
                    'title' => 'Industrial Chic Office',
                    'category' => 'Urban Sophistication',
                    'image' => 'blocks/design-industrial-chic.jpg',
                ],
                [
                    'title' => 'Art Deco Executive Floor',
                    'category' => 'Classic Luxury',
                    'image' => 'blocks/design-art-deco-floor.jpg',
                ],
            ],
        ],
    ],

    // 4. "How organization works" → process-how-organization-works (process)
    [
        'type' => 'process_variation_2',
        'data' => [
            'title' => 'How Our Organization Works for You',
            'steps' => [
                [
                    'number' => '01',
                    'title' => 'Private Consultation',
                    'description' => 'Schedule an exclusive personalized tour and discuss your specific requirements with our membership director in complete confidential privacy with no obligations.',
                    'icon' => 'flaticon-consultation',
                ],
                [
                    'number' => '02',
                    'title' => 'Bespoke Proposal',
                    'description' => 'Receive a customized comprehensive proposal detailing premium space options, exclusive services, and distinguished membership benefits tailored precisely to your needs.',
                    'icon' => 'flaticon-proposal',
                ],
                [
                    'number' => '03',
                    'title' => 'Space Customization',
                    'description' => 'Work with our award-winning interior design team to personalize your office with your corporate branding, preferred furnishings, and advanced technology requirements.',
                    'icon' => 'flaticon-customization',
                ],
                [
                    'number' => '04',
                    'title' => 'Seamless Transition',
                    'description' => 'Move in immediately to your fully prepared and equipped workspace with IT infrastructure configured and concierge services activated on day one.',
                    'icon' => 'flaticon-transition',
                ],
            ],
        ],
    ],

    // 5. "We Making home" → cta-we-making-home (cta_offer)
    [
        'type' => 'cta',
        'data' => [
            'subtitle' => 'Ready to Elevate Your Business?',
            'title' => 'We\'re Making Your Professional Dreams Reality',
            'phone' => '+1 (555) 789-EXEC',
            'phone_icon' => 'flaticon-phone-luxury',
            'badge_text' => '24/7 Concierge',
            'rotating_words' => [
                ['word' => 'Prestigious'],
                ['word' => 'Sophisticated'],
                ['word' => 'Exclusive'],
                ['word' => 'Inspiring'],
            ],
        ],
    ],

    // 6. "The best pricing" → pricing-the-best-pricing (pricing_table)
    [
        'type' => 'pricing_table',
        'data' => [
            'title' => 'The Best Investment in Your Success',
            'plans' => [
                [
                    'name' => 'Executive',
                    'price' => '2,950',
                    'period' => 'month',
                    'features' => [
                        ['text' => 'Private windowed office (150-200 sq ft)', 'included' => true],
                        ['text' => 'Premium furnishings package included', 'included' => true],
                        ['text' => '24/7 secure building access', 'included' => true],
                        ['text' => '10 hours boardroom usage monthly', 'included' => true],
                        ['text' => 'Business address and mail handling', 'included' => true],
                        ['text' => 'Standard concierge services', 'included' => true],
                        ['text' => 'Access to all common areas', 'included' => true],
                        ['text' => 'Monthly networking events', 'included' => true],
                    ],
                    'button_text' => 'Schedule Tour',
                    'featured' => false,
                ],
                [
                    'name' => 'Presidential',
                    'price' => '4,950',
                    'period' => 'month',
                    'features' => [
                        ['text' => 'Corner office with panoramic views (250-350 sq ft)', 'included' => true],
                        ['text' => 'Luxury Italian furnishings', 'included' => true],
                        ['text' => 'Dedicated executive assistant (20 hrs/week)', 'included' => true],
                        ['text' => 'Unlimited boardroom access', 'included' => true],
                        ['text' => 'Premium concierge services', 'included' => true],
                        ['text' => 'Private reception area', 'included' => true],
                        ['text' => 'Complimentary valet parking', 'included' => true],
                        ['text' => 'VIP networking events', 'included' => true],
                    ],
                    'button_text' => 'Reserve Now',
                    'featured' => true,
                ],
                [
                    'name' => 'Chairman',
                    'price' => 'Custom',
                    'period' => 'tailored',
                    'features' => [
                        ['text' => 'Full-floor penthouse suite (1000+ sq ft)', 'included' => true],
                        ['text' => 'Fully customized design and furnishings', 'included' => true],
                        ['text' => 'Dedicated executive support team', 'included' => true],
                        ['text' => 'Private boardroom and lounge', 'included' => true],
                        ['text' => 'White-glove concierge service', 'included' => true],
                        ['text' => 'Chauffeur service included', 'included' => true],
                        ['text' => 'Global workspace access', 'included' => true],
                        ['text' => 'Exclusive retreat invitations', 'included' => true],
                    ],
                    'button_text' => 'Contact Us',
                    'featured' => false,
                ],
            ],
        ],
    ],

    // 7. "Making your home" → pricing-making-your-home (services)
    [
        'type' => 'services',
        'data' => [
            'title' => 'Making Your Workspace Feel Like Your Private Sanctuary',
            'content' => '<p>We understand that exceptional professionals deserve exceptional environments. Every detail of our workspaces is meticulously designed to make you feel valued, inspired, and empowered to achieve your most ambitious goals.</p><p>From the precise temperature control in your private office to the curated selection of international newspapers in our reading lounge, from the artisanal quality of coffee in your suite to the promptness of our responses—everything reflects our unwavering commitment to your comfort and continued success.</p><p>This is not just a place to work. This is your professional home, your strategic headquarters, your personal sanctuary for building the future you envision.</p>',
            'image' => 'blocks/sanctuary-professional-home.jpg',
            'button_text' => 'Experience the Difference',
            'button_url' => '/contact',
        ],
    ],

    // 8. "See Our Latest Case Studies" → portfolio-see-our-latest-case-2 (portfolio_grid)
    [
        'type' => 'portfolio_variation_3',
        'data' => [
            'title' => 'See Our Latest Transformations',
            'columns' => 4,
            'items' => [
                [
                    'title' => 'Venture Capital Headquarters',
                    'category' => 'Financial Services',
                    'image' => 'blocks/case-venture-capital-hq.jpg',
                ],
                [
                    'title' => 'Boutique Law Firm',
                    'category' => 'Legal',
                    'image' => 'blocks/case-law-firm-boutique.jpg',
                ],
                [
                    'title' => 'Luxury Brand Atelier',
                    'category' => 'Fashion',
                    'image' => 'blocks/case-fashion-atelier.jpg',
                ],
                [
                    'title' => 'Private Equity Office',
                    'category' => 'Investment',
                    'image' => 'blocks/case-private-equity-office.jpg',
                ],
                [
                    'title' => 'Architecture Studio',
                    'category' => 'Design',
                    'image' => 'blocks/case-architecture-studio.jpg',
                ],
                [
                    'title' => 'Wealth Management Suite',
                    'category' => 'Finance',
                    'image' => 'blocks/case-wealth-management.jpg',
                ],
            ],
        ],
    ],

    // 9. "Award & achievement" → awards-award-achievement (awards)
    [
        'type' => 'awards',
        'data' => [
            'title' => 'Award & Achievement Recognition',
            'awards' => [
                [
                    'title' => 'World\'s Best Luxury Workspace',
                    'year' => '2024',
                    'description' => 'Recognized by International Business Design Association for exceptional architectural design and outstanding service excellence in the luxury workspace sector.',
                    'image' => 'blocks/award-luxury-workspace-2024.jpg',
                ],
                [
                    'title' => 'Architectural Excellence Award',
                    'year' => '2023',
                    'description' => 'Honored by Global Architecture Forum for innovative integration of luxury aesthetics and functional business environments.',
                    'image' => 'blocks/award-architecture-excellence.jpg',
                ],
                [
                    'title' => 'Premium Service Innovation',
                    'year' => '2023',
                    'description' => 'Distinguished by Executive Workspace Alliance for pioneering five-star concierge services and member experience innovation.',
                    'image' => 'blocks/award-service-innovation.jpg',
                ],
                [
                    'title' => 'Sustainable Luxury Certification',
                    'year' => '2022',
                    'description' => 'Certified by Environmental Design Council for eco-conscious luxury implementation without compromising on quality or aesthetics.',
                    'image' => 'blocks/award-sustainable-luxury.jpg',
                ],
            ],
        ],
    ],

    // 10. "Choose plan for" → pricing-choose-plan-for (pricing_table)
    [
        'type' => 'pricing_variation_2',
        'data' => [
            'title' => 'Choose Your Path to Excellence',
            'plans' => [
                [
                    'name' => 'Virtual Executive',
                    'price' => '595',
                    'period' => 'month',
                    'features' => [
                        ['text' => 'Prestigious business address', 'included' => true],
                        ['text' => 'Professional mail handling service', 'included' => true],
                        ['text' => '8 hours office space access monthly', 'included' => true],
                        ['text' => '4 hours meeting room access', 'included' => true],
                        ['text' => 'Local phone number with forwarding', 'included' => true],
                        ['text' => 'Digital mail scanning service', 'included' => false],
                    ],
                    'button_text' => 'Get Started',
                    'featured' => false,
                ],
                [
                    'name' => 'Senior Executive',
                    'price' => '7,950',
                    'period' => 'month',
                    'features' => [
                        ['text' => 'Prestigious corner suite (400-500 sq ft)', 'included' => true],
                        ['text' => 'Adjacent private conference room', 'included' => true],
                        ['text' => 'Full-time executive assistant', 'included' => true],
                        ['text' => 'Unlimited facility access', 'included' => true],
                        ['text' => 'Chauffeur service (40 hours monthly)', 'included' => true],
                        ['text' => 'Priority event booking privileges', 'included' => true],
                    ],
                    'button_text' => 'Reserve Suite',
                    'featured' => true,
                ],
                [
                    'name' => 'Enterprise Floor',
                    'price' => '49,950',
                    'period' => 'month',
                    'features' => [
                        ['text' => 'Dedicated floor (5,000-10,000 sq ft)', 'included' => true],
                        ['text' => 'Fully branded and customized environment', 'included' => true],
                        ['text' => 'Dedicated support team', 'included' => true],
                        ['text' => 'Private reception and executive lounge', 'included' => true],
                        ['text' => 'Integrated technology solutions', 'included' => true],
                        ['text' => 'Global office network access', 'included' => true],
                    ],
                    'button_text' => 'Inquire Now',
                    'featured' => false,
                ],
            ],
        ],
    ],

    // 11. "We design thoughtful" → about-we-design-thoughtful (about)
    [
        'type' => 'about_variation_3',
        'data' => [
            'subtitle' => 'Our Philosophy',
            'title' => 'We Design Thoughtful Environments for Thoughtful Leaders',
            'content' => '<p>Every successful leader understands that environment profoundly shapes outcomes. Our spaces are meticulously designed to enhance focus, facilitate meaningful collaboration, and project unquestionable authority.</p><p>We study the habits of exceptional performers, the aesthetics of timeless design, and the psychology of productive spaces. The result is an environment where every element—from acoustics to aromatics—supports your highest performance and inspires your greatest achievements.</p>',
            'image' => 'blocks/thoughtful-design-philosophy.jpg',
            'list_items' => [
                [
                    'text' => 'Evidence-based ergonomic design for sustained focus',
                    'icon' => 'flaticon-ergonomics',
                ],
                [
                    'text' => 'Biophilic elements proven to enhance creativity',
                    'icon' => 'flaticon-nature',
                ],
                [
                    'text' => 'Acoustic engineering for confidential discussions',
                    'icon' => 'flaticon-acoustics',
                ],
                [
                    'text' => 'Circadian lighting systems optimizing alertness',
                    'icon' => 'flaticon-lighting',
                ],
            ],
        ],
    ],

    // 12. "Choose plan for house" → pricing-choose-plan-for-house (pricing_table)
    [
        'type' => 'pricing_variation_3',
        'data' => [
            'title' => 'Choose the Perfect Plan for Your Organization',
            'plans' => [
                [
                    'name' => 'Entrepreneur Suite',
                    'price' => '1,895',
                    'features' => [
                        ['text' => 'Private office (120-150 sq ft)', 'included' => true],
                        ['text' => 'Premium furniture included', 'included' => true],
                        ['text' => '8 hours meeting space monthly', 'included' => true],
                        ['text' => 'High-speed internet connection', 'included' => true],
                        ['text' => 'Professional reception services', 'included' => true],
                        ['text' => 'Kitchen and lounge access', 'included' => true],
                        ['text' => 'Professional cleaning daily', 'included' => true],
                    ],
                    'button_text' => 'Start Today',
                ],
                [
                    'name' => 'Director Suite',
                    'price' => '3,795',
                    'features' => [
                        ['text' => 'Premium office (200-250 sq ft)', 'included' => true],
                        ['text' => 'Designer furniture selection', 'included' => true],
                        ['text' => '20 hours meeting space monthly', 'included' => true],
                        ['text' => 'Dedicated phone line', 'included' => true],
                        ['text' => 'Part-time assistant (10 hrs/week)', 'included' => true],
                        ['text' => 'Complimentary beverages', 'included' => true],
                        ['text' => 'Networking events access', 'included' => true],
                    ],
                    'button_text' => 'Reserve Now',
                ],
                [
                    'name' => 'C-Suite Floor',
                    'price' => '14,950',
                    'features' => [
                        ['text' => 'Executive suite (600-800 sq ft)', 'included' => true],
                        ['text' => 'Bespoke design and furnishing', 'included' => true],
                        ['text' => 'Private boardroom included', 'included' => true],
                        ['text' => 'Full-time assistant support', 'included' => true],
                        ['text' => 'Comprehensive concierge services', 'included' => true],
                        ['text' => 'Valet parking for you and guests', 'included' => true],
                        ['text' => 'VIP lounge access', 'included' => true],
                    ],
                    'button_text' => 'Contact Us',
                ],
            ],
        ],
    ],

    // 13. "our beginning" → about-our-beginning (history_timeline)
    [
        'type' => 'history_timeline',
        'data' => [
            'title' => 'Our Journey to Excellence',
            'events' => [
                [
                    'year' => '2015',
                    'title' => 'Visionary Founding',
                    'description' => 'Established with a singular vision: to create workspace environments that rival the world\'s finest private clubs, luxury hotels, and prestigious corporate headquarters.',
                    'image' => 'blocks/history-founding-2015.jpg',
                ],
                [
                    'year' => '2017',
                    'title' => 'First Landmark Location',
                    'description' => 'Opened our flagship 50,000 sq ft space in the city\'s most prestigious financial district, setting new industry standards for luxury workspace excellence.',
                    'image' => 'blocks/history-flagship-2017.jpg',
                ],
                [
                    'year' => '2019',
                    'title' => 'Global Expansion',
                    'description' => 'Extended our reach to 15 major metropolitan cities worldwide, offering distinguished members seamless access to excellence wherever business takes them.',
                    'image' => 'blocks/history-expansion-2019.jpg',
                ],
                [
                    'year' => '2021',
                    'title' => 'Technology Integration',
                    'description' => 'Pioneered smart workspace technology while maintaining timeless aesthetic values, merging cutting-edge innovation with traditional elegance.',
                    'image' => 'blocks/history-technology-2021.jpg',
                ],
                [
                    'year' => '2024',
                    'title' => 'Industry Leadership',
                    'description' => 'Recognized globally as the definitive standard in luxury workspace, with over 5,000 distinguished members and 50+ prestigious locations worldwide.',
                    'image' => 'blocks/history-leadership-2024.jpg',
                ],
            ],
        ],
    ],
];

<?php

// Database Page 3: Prestige Professional Quarters
// Based on sections.md - 13 sections total

return [
    // 1. "Exceptional designing" → about-exceptional-designing (about)
    [
        'type' => 'about_variation_4',
        'data' => [
            'subtitle' => 'Architectural Mastery',
            'title' => 'Exceptional Design that Commands Attention',
            'content' => '<p>Our spaces are conceived by award-winning architects and interior designers who understand that true luxury is found in the perfect synthesis of form, function, and feeling.</p><p>Every material is selected for its provenance and uncompromising quality. Every piece of art is curated to inspire. Every spatial proportion is calculated to create the perfect balance of grandeur and intimacy that defines sophisticated professional environments.</p>',
            'image' => 'blocks/exceptional-design-mastery.jpg',
            'features' => [
                [
                    'icon' => 'flaticon-heritage',
                    'text' => 'Heritage craftsmanship with modern sensibility',
                ],
                [
                    'icon' => 'flaticon-materials',
                    'text' => 'Rare materials sourced from master artisans globally',
                ],
                [
                    'icon' => 'flaticon-timeless',
                    'text' => 'Timeless aesthetics that transcend trends',
                ],
            ],
        ],
    ],

    // 2. "What We Offer For You" → pricing-what-we-offer-for-2 (services_grid)
    [
        'type' => 'services_grid_variation_3',
        'data' => [
            'subtitle' => 'Comprehensive Offerings',
            'title' => 'What We Offer for Discerning Professionals',
            'columns' => 3,
            'services' => [
                [
                    'icon' => 'flaticon-wellness-spa',
                    'title' => 'Wellness & Rejuvenation',
                    'description' => 'On-site spa services, private meditation rooms, professional yoga studios, therapeutic massage therapy, and personal wellness consultants to maintain peak performance and work-life harmony.',
                ],
                [
                    'icon' => 'flaticon-dining',
                    'title' => 'Culinary Excellence',
                    'description' => 'Michelin-quality dining experiences, private executive chef services, expertly curated wine cellars, and sophisticated entertaining spaces perfect for client relations and business development.',
                ],
                [
                    'icon' => 'flaticon-technology',
                    'title' => 'Technology Ecosystem',
                    'description' => 'Cutting-edge IT infrastructure, dedicated 24/7 tech support team, smart office automation systems, and seamless integration with your existing business technology platforms.',
                ],
            ],
        ],
    ],

    // 3. "Why Choose" → pricing-why-choose (features_grid)
    [
        'type' => 'features_grid',
        'data' => [
            'title' => 'Why Distinguished Leaders Choose Us',
            'features' => [
                [
                    'icon' => 'flaticon-trust',
                    'title' => 'Uncompromising Standards',
                    'description' => 'We never compromise on quality, service, or attention to detail. Excellence is not just our goal—it is our only acceptable standard in every interaction.',
                    'image' => 'blocks/feature-standards-excellence.jpg',
                ],
                [
                    'icon' => 'flaticon-community',
                    'title' => 'Curated Community',
                    'description' => 'Our selective membership process ensures you\'re surrounded by accomplished, ethical, and inspiring professionals who share your values and ambitions.',
                    'image' => 'blocks/feature-community-curated.jpg',
                ],
                [
                    'icon' => 'flaticon-flexibility',
                    'title' => 'Ultimate Flexibility',
                    'description' => 'Scale your space as your organization evolves. Access our global network of locations. Customize every detail to match your exact preferences and requirements.',
                    'image' => 'blocks/feature-flexibility-ultimate.jpg',
                ],
                [
                    'icon' => 'flaticon-value',
                    'title' => 'Exceptional Value',
                    'description' => 'When you consider the alternatives—purchasing real estate, furnishing, staffing, maintaining—our comprehensive turnkey solution delivers remarkable value and peace of mind.',
                    'image' => 'blocks/feature-value-exceptional.jpg',
                ],
            ],
        ],
    ],

    // 4. "We Making home" → cta-we-making-home (cta_offer) - same as page 2
    [
        'type' => 'cta',
        'data' => [
            'subtitle' => 'Your Success Deserves This',
            'title' => 'We\'re Making Excellence Accessible',
            'phone' => '+1 (555) 789-EXEC',
            'phone_icon' => 'flaticon-phone-luxury',
            'badge_text' => 'Immediate Response',
            'rotating_words' => [
                ['word' => 'Remarkable'],
                ['word' => 'Distinguished'],
                ['word' => 'Exceptional'],
                ['word' => 'Unparalleled'],
            ],
        ],
    ],

    // 5. "Examination Package" → pricing-examination-package (pricing_table)
    [
        'type' => 'pricing_variation_4',
        'data' => [
            'title' => 'Experience Packages Designed for Excellence',
            'plans' => [
                [
                    'name' => 'Day Pass',
                    'price' => '295',
                    'features' => [
                        ['text' => 'Full day access (8am-8pm)', 'included' => true],
                        ['text' => 'Private office or designated desk', 'included' => true],
                        ['text' => '2 hours meeting room usage', 'included' => true],
                        ['text' => 'High-speed WiFi connectivity', 'included' => true],
                        ['text' => 'Premium coffee and refreshments', 'included' => true],
                        ['text' => 'Business center services', 'included' => true],
                    ],
                    'button_text' => 'Book Now',
                ],
                [
                    'name' => 'Monthly Trial',
                    'price' => '1,495',
                    'features' => [
                        ['text' => '40 hours monthly access', 'included' => true],
                        ['text' => 'Flex desk in premium areas', 'included' => true],
                        ['text' => '10 hours meeting space', 'included' => true],
                        ['text' => 'Professional mail handling services', 'included' => true],
                        ['text' => 'All amenities included', 'included' => true],
                        ['text' => 'Networking events invitation', 'included' => true],
                    ],
                    'button_text' => 'Start Trial',
                ],
                [
                    'name' => 'Annual Membership',
                    'price' => '32,950',
                    'features' => [
                        ['text' => 'Dedicated private office', 'included' => true],
                        ['text' => 'Unlimited facility access', 'included' => true],
                        ['text' => 'Complimentary meeting rooms', 'included' => true],
                        ['text' => 'Executive assistant support', 'included' => true],
                        ['text' => 'Global office access', 'included' => true],
                        ['text' => 'VIP member benefits', 'included' => true],
                    ],
                    'button_text' => 'Commit to Excellence',
                ],
            ],
        ],
    ],

    // 6. "Transforming dull spaces" → faq-transforming-dull-spaces (hero)
    [
        'type' => 'hero',
        'data' => [
            'title' => 'Transforming Aspirations into Achievement',
            'subtitle' => 'Your workspace should be as ambitious as your goals',
            'background_image' => 'blocks/hero-aspirations-achievement.jpg',
            'button_text' => 'Begin Your Journey',
            'button_url' => '/contact',
        ],
    ],

    // 7. "Thoughtful livable spaces design" → pricing-thoughtful-livable-spaces-design (services)
    [
        'type' => 'services_variation_2',
        'data' => [
            'title' => 'Thoughtful, Livable Spaces for Your Daily Excellence',
            'content' => '<p>We recognize that you don\'t simply work in your office—you live in it during business hours. Your space should energize rather than deplete you, inspire rather than constrain you.</p><p>That\'s why we obsess over details others overlook: the warmth of lighting at different times of day, the quality of air you breathe, the texture of materials you touch, the acoustics that allow both productive collaboration and deep concentration.</p>',
            'image' => 'blocks/livable-excellence-daily.jpg',
        ],
    ],

    // 8. "Selected Case" → portfolio-selected-case (portfolio_grid)
    [
        'type' => 'portfolio_variation_4',
        'data' => [
            'title' => 'Selected Showcase: Where Leaders Work',
            'columns' => 3,
            'items' => [
                [
                    'title' => 'Fintech Innovators Hub',
                    'category' => 'Financial Technology',
                    'image' => 'blocks/showcase-fintech-hub.jpg',
                ],
                [
                    'title' => 'Luxury Real Estate Office',
                    'category' => 'Property Development',
                    'image' => 'blocks/showcase-real-estate.jpg',
                ],
                [
                    'title' => 'Consulting Excellence Center',
                    'category' => 'Strategy Consulting',
                    'image' => 'blocks/showcase-consulting.jpg',
                ],
                [
                    'title' => 'Media Production Studio',
                    'category' => 'Entertainment',
                    'image' => 'blocks/showcase-media-production.jpg',
                ],
                [
                    'title' => 'Pharmaceutical Research',
                    'category' => 'Healthcare Innovation',
                    'image' => 'blocks/showcase-pharma-research.jpg',
                ],
                [
                    'title' => 'Diplomatic Mission Office',
                    'category' => 'International Relations',
                    'image' => 'blocks/showcase-diplomatic.jpg',
                ],
            ],
        ],
    ],

    // 9. "Join the companies that trust" → section-join-the-companies-that (clients_logos)
    [
        'type' => 'clients_logos',
        'data' => [
            'title' => 'Join the Companies that Trust Our Excellence',
            'description' => 'Trusted by leading organizations across industries worldwide',
            'clients' => [
                [
                    'name' => 'Goldman Sachs',
                    'logo' => 'blocks/client-logo-goldman.png',
                    'url' => 'https://goldmansachs.com',
                ],
                [
                    'name' => 'McKinsey & Company',
                    'logo' => 'blocks/client-logo-mckinsey.png',
                    'url' => 'https://mckinsey.com',
                ],
                [
                    'name' => 'Deloitte',
                    'logo' => 'blocks/client-logo-deloitte.png',
                    'url' => 'https://deloitte.com',
                ],
                [
                    'name' => 'LVMH',
                    'logo' => 'blocks/client-logo-lvmh.png',
                    'url' => 'https://lvmh.com',
                ],
                [
                    'name' => 'Tesla',
                    'logo' => 'blocks/client-logo-tesla.png',
                    'url' => 'https://tesla.com',
                ],
                [
                    'name' => 'Sotheby\'s',
                    'logo' => 'blocks/client-logo-sothebys.png',
                    'url' => 'https://sothebys.com',
                ],
            ],
        ],
    ],

    // 10. "We design" → pricing-we-design (services)
    [
        'type' => 'services_variation_3',
        'data' => [
            'title' => 'We Design for Those Who Refuse to Settle',
            'content' => '<p>You didn\'t build your success by accepting mediocrity. Neither do we.</p>',
            'services' => [
                [
                    'icon' => 'flaticon-bespoke',
                    'title' => 'Bespoke Design',
                    'description' => 'Every element customized to reflect your unique brand identity and personal preferences.',
                ],
                [
                    'icon' => 'flaticon-innovation',
                    'title' => 'Innovation Integration',
                    'description' => 'Latest technology seamlessly woven into classic design principles.',
                ],
                [
                    'icon' => 'flaticon-sustainability',
                    'title' => 'Sustainable Luxury',
                    'description' => 'Environmental responsibility without compromising aesthetic or comfort standards.',
                ],
            ],
        ],
    ],

    // 11. "What Can We Offer" → pricing-what-can-we-offer (services_grid)
    [
        'type' => 'services_grid_variation_4',
        'data' => [
            'title' => 'What More Can We Offer?',
            'columns' => 4,
            'services' => [
                [
                    'icon' => 'flaticon-library',
                    'title' => 'Private Library',
                    'description' => 'Curated collection of business literature and rare editions.',
                ],
                [
                    'icon' => 'flaticon-cigar',
                    'title' => 'Cigar Lounge',
                    'description' => 'Temperature-controlled humidor with premium selection.',
                ],
                [
                    'icon' => 'flaticon-golf',
                    'title' => 'Golf Simulator',
                    'description' => 'Practice your swing on virtual world-class courses.',
                ],
                [
                    'icon' => 'flaticon-barber',
                    'title' => 'Grooming Suite',
                    'description' => 'Professional barber and styling services available.',
                ],
            ],
        ],
    ],

    // 12. "meet designer" → team-meet-designer (team)
    [
        'type' => 'team',
        'data' => [
            'title' => 'Meet the Visionaries Behind Your Success',
            'members' => [
                [
                    'name' => 'Richard Sterling',
                    'position' => 'Founder & Chief Visionary Officer',
                    'image' => 'blocks/team-founder-sterling.jpg',
                    'email' => 'richard.sterling@workspace.com',
                    'phone' => '+1 (555) 789-1001',
                    'social_links' => [
                        ['platform' => 'linkedin', 'url' => 'https://linkedin.com/in/richardsterling'],
                        ['platform' => 'twitter', 'url' => 'https://twitter.com/rsterling'],
                    ],
                ],
                [
                    'name' => 'Elena Maximova',
                    'position' => 'Chief Design Officer',
                    'image' => 'blocks/team-design-maximova.jpg',
                    'email' => 'elena.maximova@workspace.com',
                    'phone' => '+1 (555) 789-1002',
                    'social_links' => [
                        ['platform' => 'linkedin', 'url' => 'https://linkedin.com/in/elenamaximova'],
                        ['platform' => 'instagram', 'url' => 'https://instagram.com/elenadesigns'],
                    ],
                ],
                [
                    'name' => 'Marcus Thompson',
                    'position' => 'Director of Member Experience',
                    'image' => 'blocks/team-experience-thompson.jpg',
                    'email' => 'marcus.thompson@workspace.com',
                    'phone' => '+1 (555) 789-1003',
                    'social_links' => [
                        ['platform' => 'linkedin', 'url' => 'https://linkedin.com/in/marcusthompson'],
                    ],
                ],
            ],
        ],
    ],

    // 13. "The advantages of" → about-the-advantages-of (icon_box)
    [
        'type' => 'icon_box_variation_2',
        'data' => [
            'title' => 'The Advantages of Choosing Prestige',
            'description' => 'When you join our community, you gain access to advantages that extend far beyond physical space.',
            'advantages' => [
                [
                    'icon' => 'flaticon-access',
                    'title' => 'Global Access',
                    'description' => 'Work from our prestigious locations in 50+ cities across 6 continents with the same level of luxury and impeccable service.',
                ],
                [
                    'icon' => 'flaticon-network',
                    'title' => 'Elite Network',
                    'description' => 'Connect with fellow members who are industry leaders, successful entrepreneurs, and influential decision-makers.',
                ],
                [
                    'icon' => 'flaticon-investment',
                    'title' => 'Asset Efficiency',
                    'description' => 'Enjoy all benefits of owning premium real estate without capital tie-up, management headaches, or depreciation risk.',
                ],
            ],
        ],
    ],
];

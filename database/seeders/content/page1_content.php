<?php

// Database Page 1: Executive Workspace Premier
// Based on sections.md - 13 sections total

return [
    // 1. "modern living area" → about-modern-living-area (slider)
    [
        'type' => 'slider',
        'data' => [
            'title' => 'Discover Your Ideal Executive Space',
            'slides' => [
                [
                    'icon' => 'blocks/icon-luxury.png',
                    'title' => 'Premium Workspace Solutions',
                    'description' => 'Meticulously designed private offices that embody sophistication and elevate your professional presence with Italian marble and hand-selected art.',
                ],
                [
                    'icon' => 'blocks/icon-productivity.png',
                    'title' => 'Enhanced Productivity Environment',
                    'description' => 'State-of-the-art ergonomic furniture and advanced technology infrastructure that optimize your workflow and inspire excellence in every task.',
                ],
                [
                    'icon' => 'blocks/icon-networking.png',
                    'title' => 'Exclusive Executive Network',
                    'description' => 'Join an elite community of visionary CEOs, successful entrepreneurs, and C-level executives in our prestigious business environment.',
                ],
                [
                    'icon' => 'blocks/icon-location.png',
                    'title' => 'Prime Business Districts',
                    'description' => 'Strategically situated in the most sought-after financial and business districts with unparalleled accessibility and commanding city views.',
                ],
            ],
        ],
    ],

    // 2. "Creating the art of" → pricing-creating-the-art-of (accordion)
    [
        'type' => 'accordion',
        'data' => [
            'title' => 'Creating the Art of Executive Excellence',
            'items' => [
                [
                    'question' => 'What defines our luxury workspace experience?',
                    'answer' => '<p>Our luxury workspaces transcend traditional office environments. Each private suite features <strong>premium Italian leather furnishings</strong>, hand-crafted executive desks from master artisans, museum-quality contemporary art pieces, and cutting-edge technology seamlessly integrated into timeless architectural design.</p><p>Climate control systems maintain perfect conditions year-round, while acoustic engineering ensures absolute confidentiality for sensitive discussions. Natural lighting combines with circadian-optimized LED systems to maintain peak alertness and reduce fatigue.</p>',
                    'image' => 'blocks/workspace-luxury-interior.jpg',
                ],
                [
                    'question' => 'What exclusive amenities distinguish our offering?',
                    'answer' => '<p>Distinguished members enjoy comprehensive five-star services including:</p><ul><li><strong>Personal Concierge Service</strong> - 24/7 multilingual support for all your professional and personal needs</li><li><strong>Culinary Excellence</strong> - Executive chef-prepared gourmet dining and curated wine cellar</li><li><strong>Wellness Facilities</strong> - Private massage rooms, meditation spaces, and state-of-the-art fitness centers</li><li><strong>Premium Transportation</strong> - Chauffeur services and secure underground valet parking</li><li><strong>Business Technology</strong> - Fiber optic connectivity, 4K video conferencing, and premium espresso bars in every suite</li></ul>',
                    'image' => 'blocks/amenities-comprehensive.jpg',
                ],
                [
                    'question' => 'How do we ensure absolute privacy and security?',
                    'answer' => '<p>We implement military-grade security protocols tailored for high-profile professionals:</p><ul><li>Biometric access control with multi-factor authentication</li><li>24/7 surveillance with AI-powered facial recognition</li><li>Encrypted communication systems and secure WiFi networks</li><li>Soundproofed private offices with white noise generators</li><li>Secure document destruction and confidential mail handling</li><li>Dedicated IT security specialists monitoring all systems</li></ul><p>Discretion and confidentiality are paramount in every aspect of our operations.</p>',
                    'image' => 'blocks/security-premium-systems.jpg',
                ],
            ],
        ],
    ],

    // 3. "Hear from clients." → testimonials-hear-from-clients (testimonials)
    [
        'type' => 'testimonials',
        'data' => [
            'title' => 'Hear from Our Distinguished Members',
            'description' => 'Industry leaders and successful entrepreneurs share their experiences in our executive workspace community',
            'testimonials' => [
                [
                    'author_name' => 'Alexander Montgomery',
                    'author_position' => 'CEO & Founder',
                    'author_location' => 'Montgomery Capital Partners',
                    'author_image' => 'blocks/testimonial-ceo-male-1.jpg',
                    'content' => 'This workspace has fundamentally transformed how I conduct business. The environment exudes prestige and inspires excellence in every client meeting. The attention to detail—from the temperature control to the quality of the coffee—and the level of personalized service is simply unmatched in the industry. My productivity has increased 40% since relocating here.',
                    'rating' => 5,
                ],
                [
                    'author_name' => 'Victoria Blackwood',
                    'author_position' => 'Managing Director',
                    'author_location' => 'Blackwood Investment Group',
                    'author_image' => 'blocks/testimonial-ceo-female-1.jpg',
                    'content' => 'As someone who values both aesthetics and functionality, I found my perfect professional home here. The sophisticated Italian design combined with cutting-edge technology creates an environment where billion-dollar investment decisions feel natural and inspired. The networking opportunities alone have been worth ten times the membership fee.',
                    'rating' => 5,
                ],
                [
                    'author_name' => 'Marcus Chen',
                    'author_position' => 'Chairman',
                    'author_location' => 'Pacific Ventures Limited',
                    'author_image' => 'blocks/testimonial-chairman-1.jpg',
                    'content' => 'The caliber of professionals in this workspace is extraordinary. Every detail, from the hand-selected marble finishes to the impeccable five-star hospitality service, reflects the excellence I demand in my business operations. This is where success meets sophisticated business environments. Truly world-class.',
                    'rating' => 5,
                ],
            ],
        ],
    ],

    // 4. "Start your healthy life" → about-start-your-healthy-life (about)
    [
        'type' => 'about',
        'data' => [
            'subtitle' => 'Executive Wellness Integration',
            'title' => 'Start Your Balanced Executive Lifestyle',
            'content' => '<p>We understand that <strong>peak performance requires holistic well-being</strong>. Our workspace seamlessly integrates comprehensive wellness amenities with business functionality, creating an environment where health, mental clarity, and productivity coexist harmoniously.</p><p>From our private meditation lounges with panoramic city views to our state-of-the-art Technogym fitness centers and organic cold-press juice bars, every element is designed to support your journey to sustained excellence. Because successful leaders know that taking care of yourself is taking care of business.</p>',
            'image' => 'blocks/wellness-executive-lifestyle.jpg',
            'features' => [
                [
                    'icon' => 'flaticon-wellness',
                    'text' => 'Private fitness centers with certified personal trainers and yoga instructors',
                ],
                [
                    'icon' => 'flaticon-meditation',
                    'text' => 'Tranquil meditation spaces with guided mindfulness sessions',
                ],
                [
                    'icon' => 'flaticon-nutrition',
                    'text' => 'Organic nutrition programs curated by Michelin-starred chefs',
                ],
            ],
        ],
    ],

    // 5. "Different case," → pricing-different-case (services_grid)
    [
        'type' => 'services_grid',
        'data' => [
            'subtitle' => 'Tailored Solutions',
            'title' => 'Different Needs, Exceptional Solutions',
            'columns' => 3,
            'services' => [
                [
                    'icon' => 'flaticon-office-private',
                    'title' => 'Private Executive Offices',
                    'description' => 'Fully furnished corner offices with floor-to-ceiling panoramic windows, premium Poltrona Frau furnishings, dedicated meeting spaces, and private reception areas designed exclusively for C-suite professionals and senior partners.',
                ],
                [
                    'icon' => 'flaticon-boardroom',
                    'title' => 'Boardroom Sanctuaries',
                    'description' => 'Impressive mahogany-appointed boardrooms equipped with holographic presentation systems, advanced audiovisual technology, full refreshment services, and executive seating for 4-20 distinguished guests with absolute privacy.',
                ],
                [
                    'icon' => 'flaticon-event-space',
                    'title' => 'Event Pavilions',
                    'description' => 'Sophisticated 2,000+ sq ft event spaces perfect for product launches, press conferences, corporate galas, and investor presentations with full-service catering from award-winning chefs and professional audiovisual production.',
                ],
            ],
        ],
    ],

    // 6. "What Can We Offer" → services-what-can-we-offer (tabs)
    [
        'type' => 'tabs',
        'data' => [
            'title' => 'What Can We Offer Your Enterprise',
            'tabs' => [
                [
                    'label' => 'Technology Infrastructure',
                    'content' => '<h4>Uncompromising connectivity and enterprise security</h4><ul class="luxury-features-list"><li><strong>10Gbps Fiber Optic Internet</strong> with 99.99% uptime guarantee and redundant connections</li><li><strong>Enterprise Cybersecurity</strong> with dedicated Security Operations Center team</li><li><strong>4K Video Conferencing Suites</strong> with simultaneous translation in 12 languages</li><li><strong>Cloud Infrastructure Integration</strong> with AWS, Azure, and Google Cloud</li><li><strong>Redundant Power Systems</strong> with UPS backup and generator failover</li><li><strong>Smart Office Automation</strong> - Control lighting, temperature, and privacy glass via app</li></ul>',
                    'image' => 'blocks/technology-infrastructure-advanced.jpg',
                ],
                [
                    'label' => 'Business Support Services',
                    'content' => '<h4>Comprehensive executive services and administrative support</h4><ul class="luxury-features-list"><li><strong>Multilingual Executive Assistants</strong> - Available 24/7 for scheduling and coordination</li><li><strong>Legal Document Preparation</strong> - Professional notary and legal support services</li><li><strong>Financial Advisory Services</strong> - Bookkeeping, accounting, and CFO consultation</li><li><strong>Travel Coordination</strong> - Private aviation, luxury hotels, and complete itinerary management</li><li><strong>Brand Development</strong> - Marketing strategy and business development consultation</li><li><strong>Reception Services</strong> - Professional front desk and call answering in your company name</li></ul>',
                    'image' => 'blocks/business-support-comprehensive.jpg',
                ],
                [
                    'label' => 'Lifestyle Concierge',
                    'content' => '<h4>Personalized luxury lifestyle services</h4><ul class="luxury-features-list"><li><strong>Fine Dining Reservations</strong> - Access to exclusive Michelin-starred restaurants</li><li><strong>Private Event Planning</strong> - Corporate galas, celebrations, and client entertainment</li><li><strong>Luxury Transportation</strong> - Private vehicle and aviation arrangements worldwide</li><li><strong>VIP Cultural Access</strong> - Premium tickets to theater, opera, sporting events, and art exhibitions</li><li><strong>Personal Shopping</strong> - Curated gift selection and worldwide delivery coordination</li><li><strong>Wellness Appointments</strong> - Spa treatments, personal training, and health optimization</li></ul>',
                    'image' => 'blocks/lifestyle-concierge-premium.jpg',
                ],
            ],
        ],
    ],

    // 7. "We design thoughtful" → section-we-design-thoughtful (before_after)
    [
        'type' => 'before_after',
        'data' => [
            'title' => 'We Design Thoughtful Transformations',
            'before_image' => 'blocks/before-standard-office.jpg',
            'after_image' => 'blocks/after-luxury-executive.jpg',
            'description' => 'Experience the dramatic transformation from conventional office space to a prestigious executive sanctuary. Our award-winning design philosophy combines timeless European elegance with modern American functionality, creating environments that elevate your professional image, enhance your daily experience, and make a lasting impression on every client and partner.',
        ],
    ],

    // 8. "Transforming dull" → about-transforming-dull (about)
    [
        'type' => 'about_variation_2',
        'data' => [
            'subtitle' => 'Workspace Revolution',
            'title' => 'Transforming Ordinary Spaces into Extraordinary Experiences',
            'content' => '<p>We revolutionize the traditional concept of workspace by crafting <strong>environments that transcend mere functionality</strong>. Each element—from the Calacatta marble reception desk to the hand-woven Persian rugs—is carefully curated to create an atmosphere of undeniable prestige and creative inspiration.</p><p>Our design philosophy draws inspiration from the world\'s finest luxury hotels, exclusive private clubs, and sophisticated residential estates, bringing that exceptional level of refinement and attention to detail to your professional environment. This is where your success story unfolds in style.</p>',
            'image' => 'blocks/transformation-luxury-design.jpg',
            'features' => [
                [
                    'icon' => 'flaticon-architecture',
                    'text' => 'Award-winning architectural design by internationally renowned firms',
                ],
                [
                    'icon' => 'flaticon-materials',
                    'text' => 'Premium materials sourced from master craftsmen globally',
                ],
                [
                    'icon' => 'flaticon-craftsmanship',
                    'text' => 'Artisanal craftsmanship evident in every exquisite detail',
                ],
            ],
        ],
    ],

    // 9. "What we offer for you" → pricing-what-we-offer-for (services_slider)
    [
        'type' => 'services_slider',
        'data' => [
            'title' => 'What We Offer For Distinguished Leaders',
            'services' => [
                [
                    'title' => 'Penthouse Executive Suites',
                    'description' => 'Top-floor corner offices with breathtaking 360-degree city views, private outdoor terraces, wet bars with premium spirits, and separate lounges for informal client meetings. The ultimate architectural statement of professional success and achievement.',
                    'image' => 'blocks/penthouse-executive-suite.jpg',
                ],
                [
                    'title' => 'Private Trading Floors',
                    'description' => 'Secure institutional-grade environments with multiple 8K displays, Bloomberg Terminal access, real-time global market data feeds, and complete soundproofing for financial professionals managing substantial investment portfolios.',
                    'image' => 'blocks/trading-floor-private.jpg',
                ],
                [
                    'title' => 'Innovation Laboratories',
                    'description' => 'Creative collaboration spaces with adjustable color-temperature lighting, professional acoustic panels, industrial 3D printing facilities, and rapid prototyping areas for visionary entrepreneurs and technology innovators.',
                    'image' => 'blocks/innovation-lab-creative.jpg',
                ],
            ],
        ],
    ],

    // 10. "Get amazing cleaning" → services-get-amazing-cleaning (process)
    [
        'type' => 'process',
        'data' => [
            'title' => 'Experience Impeccable Maintenance Excellence',
            'steps' => [
                [
                    'number' => '01',
                    'title' => 'White Glove Cleaning',
                    'description' => 'Our professional housekeeping team maintains museum-quality showroom condition daily using eco-luxury certified products and meticulous five-star hotel standards with exceptional attention to every detail.',
                    'icon' => 'flaticon-cleaning-luxury',
                ],
                [
                    'number' => '02',
                    'title' => 'Proactive Maintenance',
                    'description' => 'Weekly comprehensive inspections and immediate professional response to any maintenance needs ensure your prestigious workspace remains absolutely flawless without ever disrupting your important business operations.',
                    'icon' => 'flaticon-maintenance-pro',
                ],
                [
                    'number' => '03',
                    'title' => 'Bespoke Customization',
                    'description' => 'Our award-winning interior design team can thoughtfully modify your space quarterly to reflect seasonal aesthetic trends or perfectly align with your evolving brand identity and corporate image.',
                    'icon' => 'flaticon-customization-design',
                ],
                [
                    'number' => '04',
                    'title' => 'Continuous Enhancement',
                    'description' => 'We invest millions in ongoing upgrades to technology infrastructure, premium furnishings, and exclusive amenities to ensure your workspace remains at the absolute forefront of luxury and innovation.',
                    'icon' => 'flaticon-upgrade-premium',
                ],
            ],
        ],
    ],

    // 11. "See our latest case studies" → portfolio-see-our-latest-case (portfolio_grid)
    [
        'type' => 'portfolio_grid',
        'data' => [
            'title' => 'See Our Latest Executive Projects',
            'columns' => 3,
            'sortable' => true,
            'items' => [
                [
                    'title' => 'Capital Ventures Tower - 45th Floor',
                    'category' => 'Investment Banking',
                    'image' => 'blocks/portfolio-investment-banking.jpg',
                    'link' => '/portfolio/capital-ventures',
                ],
                [
                    'title' => 'Tech Innovators Campus',
                    'category' => 'Technology',
                    'image' => 'blocks/portfolio-tech-startup.jpg',
                    'link' => '/portfolio/tech-innovators',
                ],
                [
                    'title' => 'Legal Eagles Suite - Partner Floor',
                    'category' => 'Corporate Law',
                    'image' => 'blocks/portfolio-legal-firm.jpg',
                    'link' => '/portfolio/legal-eagles',
                ],
                [
                    'title' => 'Medical Excellence Center',
                    'category' => 'Healthcare',
                    'image' => 'blocks/portfolio-medical-executive.jpg',
                    'link' => '/portfolio/medical-excellence',
                ],
                [
                    'title' => 'Creative Visionaries Studio',
                    'category' => 'Design & Media',
                    'image' => 'blocks/portfolio-creative-agency.jpg',
                    'link' => '/portfolio/creative-visionaries',
                ],
                [
                    'title' => 'Global Trade Headquarters',
                    'category' => 'Import/Export',
                    'image' => 'blocks/portfolio-trade-international.jpg',
                    'link' => '/portfolio/global-trade',
                ],
            ],
        ],
    ],

    // 12. "Design without limits" → pricing-design-without-limits (features_slider)
    [
        'type' => 'features_slider',
        'data' => [
            'title' => 'Design Without Limits, Success Without Boundaries',
            'columns' => 4,
            'features' => [
                [
                    'icon' => 'flaticon-flexible-terms',
                    'title' => 'Flexible Terms',
                    'description' => 'From daily hot-desking to comprehensive multi-year agreements tailored precisely to your strategic business planning and growth trajectory.',
                ],
                [
                    'icon' => 'flaticon-scalable-space',
                    'title' => 'Scalable Spaces',
                    'description' => 'Expand your footprint or consolidate operations seamlessly as your enterprise evolves, without the capital constraints of traditional real estate ownership.',
                ],
                [
                    'icon' => 'flaticon-global-network',
                    'title' => 'Global Network',
                    'description' => 'Exclusive access to 50+ prestigious locations in major cities worldwide with full reciprocal member privileges and seamless booking through our mobile app.',
                ],
                [
                    'icon' => 'flaticon-exclusive-events',
                    'title' => 'Members Only Events',
                    'description' => 'Curated networking events, executive masterclasses, wine tastings, and exclusive cultural experiences designed specifically for our distinguished membership community.',
                ],
            ],
        ],
    ],

    // 13. "Here's what our" → testimonials-heres-what-our (testimonials)
    [
        'type' => 'testimonials_variation_2',
        'data' => [
            'title' => 'Here\'s What Our Elite Members Say',
            'description' => 'Distinguished professionals and industry leaders describe their transformation',
            'testimonials' => [
                [
                    'author_name' => 'Isabella Rothschild',
                    'author_position' => 'Principal Partner',
                    'author_image' => 'blocks/testimonial-partner-female.jpg',
                    'content' => 'Every aspect of this workspace speaks to uncompromising excellence. From the moment you enter the stunning Italian marble lobby to the personalized concierge service throughout the day, you experience the profound difference. This is not just an office—it\'s a powerful statement of who you are and where you\'re going. Simply magnificent.',
                    'rating' => 5,
                ],
                [
                    'author_name' => 'William Ashford III',
                    'author_position' => 'Executive Chairman',
                    'author_image' => 'blocks/testimonial-chairman-male.jpg',
                    'content' => 'I\'ve conducted business in the finest establishments across six continents over four decades. This workspace rivals them all in every dimension. The perfect combination of absolute privacy, undeniable prestige, and uncompromising five-star service creates the ideal environment for high-stakes negotiations and strategic planning.',
                    'rating' => 5,
                ],
                [
                    'author_name' => 'Sophia Laurent',
                    'author_position' => 'Founder & CEO',
                    'author_image' => 'blocks/testimonial-ceo-female-2.jpg',
                    'content' => 'Building a luxury fashion brand requires operating from a luxury environment that reflects your values. This workspace substantially enhances our brand perception with discerning clients and consistently attracts top-tier creative talent. The return on investment extends far beyond the lease agreement—it\'s immeasurable.',
                    'rating' => 5,
                ],
            ],
        ],
    ],
];

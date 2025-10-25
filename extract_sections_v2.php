<?php

$baseDir = 'D:/Server/exe-site/original/';

// Define the search mapping (exact from sections.md)
$searchMap = [
    1 => [
        'homepage-2.php' => [
            'modern living area',
            'Creating the art of',
            'Hear from clients.',
        ],
        'homepage-3.php' => [
            'Start your healthy life',
            'Different case,',
            'What Can We Offer',
            'We design thoughtful',
        ],
        'homepage-4.php' => [
            'Transforming dull',
            'What we offer for you',
            'Get amazing cleaning',
            'See our latest case studies',
            'Design without limits',
            'Here\'s what our',
        ],
    ],
    2 => [
        'homepage-5.php' => [
            'Creating the',
            'The advantages of our',
            'minimalism',
            'How organization works',
            'We Making home',
            'The best pricing',
        ],
        'homepage-6.php' => [
            'Making your home',
            'See Our Latest Case Studies',
            'Award & achievement',
            'Choose plan for',
        ],
        'homepage-1.php' => [
            'We design thoughtful',
            'Choose plan for house',
        ],
        'our-history.html' => [
            'our beginning',
        ],
    ],
    3 => [
        'homepage-7.php' => [
            'Exceptional designing',
            'What We Offer For You',
            'Why Choose',
            'We Making home',
            'Examination Package',
        ],
        'homepage-8.php' => [
            'Transforming dull spaces',
            'Thoughtful livable spaces design',
            'Selected Case',
            'Join the companies that trust',
        ],
        'homepage-9.php' => [
            'We design',
            'What Can We Offer',
            'meet designer',
            'The advantages of',
        ],
    ],
];

$results = [];
$sectionCounter = [];

function generateSectionName($text, $html, &$counter)
{
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9\s]/', '', $text);
    $words = explode(' ', trim($text));
    $words = array_filter($words);
    $words = array_slice($words, 0, 4);
    $baseName = implode('-', $words);

    $htmlLower = strtolower($html);

    // Context-based prefix detection
    if (stripos($html, 'testimonial') !== false || stripos($text, 'client') !== false || stripos($text, 'hear from') !== false) {
        $prefix = 'testimonials';
    } elseif (stripos($html, 'pricing') !== false || stripos($html, 'plan') !== false || stripos($text, 'pricing') !== false || stripos($text, 'package') !== false) {
        $prefix = 'pricing';
    } elseif (stripos($html, 'swiper') !== false && stripos($html, 'banner') !== false) {
        $prefix = 'hero';
    } elseif (stripos($html, 'service') !== false || stripos($text, 'offer') !== false) {
        $prefix = 'services';
    } elseif (stripos($html, 'portfolio') !== false || stripos($html, 'case') !== false || stripos($text, 'case') !== false) {
        $prefix = 'portfolio';
    } elseif (stripos($html, 'about') !== false || stripos($text, 'beginning') !== false || stripos($text, 'history') !== false) {
        $prefix = 'about';
    } elseif (stripos($html, 'advantage') !== false || stripos($text, 'advantage') !== false || stripos($text, 'why choose') !== false) {
        $prefix = 'features';
    } elseif (stripos($html, 'team') !== false || stripos($text, 'designer') !== false || stripos($text, 'meet') !== false) {
        $prefix = 'team';
    } elseif (stripos($html, 'accordion') !== false || stripos($html, 'faq') !== false) {
        $prefix = 'faq';
    } elseif (stripos($html, 'award') !== false || stripos($text, 'achievement') !== false) {
        $prefix = 'awards';
    } elseif (stripos($html, 'process') !== false || stripos($text, 'how') !== false || stripos($text, 'works') !== false) {
        $prefix = 'process';
    } elseif (stripos($html, 'pbmit-slider') !== false || stripos($html, 'swiper-container') !== false) {
        $prefix = 'slider';
    } elseif (stripos($html, 'cta') !== false || stripos($html, 'call') !== false) {
        $prefix = 'cta';
    } else {
        $prefix = 'section';
    }

    $fullName = $prefix.'-'.$baseName;

    // Ensure uniqueness
    if (! isset($counter[$fullName])) {
        $counter[$fullName] = 1;

        return $fullName;
    } else {
        $counter[$fullName]++;

        return $fullName.'-'.$counter[$fullName];
    }
}

function extractSection($filePath, $searchText)
{
    if (! file_exists($filePath)) {
        return ['error' => 'File not found: '.$filePath];
    }

    $content = file_get_contents($filePath);
    $lines = explode("\n", $content);

    // Find the line containing the search text (case insensitive)
    $foundLine = -1;
    foreach ($lines as $index => $line) {
        if (stripos($line, $searchText) !== false) {
            $foundLine = $index;
            break;
        }
    }

    if ($foundLine === -1) {
        return ['error' => 'Text not found: '.$searchText];
    }

    // Find the opening <section> tag before this line
    $sectionStart = -1;
    for ($i = $foundLine; $i >= 0; $i--) {
        if (preg_match('/<section[\s>]/i', $lines[$i])) {
            $sectionStart = $i;
            break;
        }
    }

    if ($sectionStart === -1) {
        return ['error' => 'No section tag found before line '.($foundLine + 1)];
    }

    // Find the closing </section> tag using depth tracking
    $sectionEnd = -1;
    $depth = 0;
    for ($i = $sectionStart; $i < count($lines); $i++) {
        $line = $lines[$i];

        // Count opening tags
        preg_match_all('/<section[\s>]/i', $line, $openMatches);
        $depth += count($openMatches[0]);

        // Count closing tags
        preg_match_all('/<\/section>/i', $line, $closeMatches);
        $depth -= count($closeMatches[0]);

        // If depth is 0 after processing closing tags, we found the end
        if ($depth === 0 && count($closeMatches[0]) > 0) {
            $sectionEnd = $i;
            break;
        }
    }

    if ($sectionEnd === -1) {
        return ['error' => 'No closing section tag found'];
    }

    // Extract the section HTML
    $sectionLines = array_slice($lines, $sectionStart, $sectionEnd - $sectionStart + 1);
    $sectionHtml = implode("\n", $sectionLines);

    return [
        'html' => $sectionHtml,
        'line_start' => $sectionStart + 1,
        'line_end' => $sectionEnd + 1,
        'found_at_line' => $foundLine + 1,
    ];
}

// Process each database page
foreach ($searchMap as $dbPage => $files) {
    foreach ($files as $filename => $searchTexts) {
        $filePath = $baseDir.$filename;

        foreach ($searchTexts as $searchText) {
            $section = extractSection($filePath, $searchText);

            if (isset($section['error'])) {
                $results[] = [
                    'database_page' => $dbPage,
                    'file' => $filename,
                    'original_text' => $searchText,
                    'section_name' => 'NOT_FOUND',
                    'error' => $section['error'],
                    'section_html_preview' => null,
                    'section_html_full_length' => 0,
                    'line_start' => null,
                    'line_end' => null,
                ];
            } else {
                $sectionName = generateSectionName($searchText, $section['html'], $sectionCounter);

                $results[] = [
                    'database_page' => $dbPage,
                    'file' => $filename,
                    'original_text' => $searchText,
                    'section_name' => $sectionName,
                    'section_html_preview' => substr($section['html'], 0, 500).'...',
                    'section_html_full_length' => strlen($section['html']),
                    'line_start' => $section['line_start'],
                    'line_end' => $section['line_end'],
                    'found_at_line' => $section['found_at_line'],
                ];
            }
        }
    }
}

// Output as JSON
echo json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

<?php

$baseDir = '/d/Server/exe-site/original/';

// Define the search mapping
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

function generateSectionName($text, $context, &$counter)
{
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9\s]/', '', $text);
    $words = explode(' ', trim($text));
    $words = array_slice($words, 0, 4);
    $baseName = implode('-', $words);

    // Add context-based prefix
    if (stripos($context, 'testimonial') !== false || stripos($text, 'client') !== false) {
        $prefix = 'testimonials';
    } elseif (stripos($context, 'pricing') !== false || stripos($text, 'plan') !== false || stripos($text, 'package') !== false) {
        $prefix = 'pricing';
    } elseif (stripos($context, 'hero') !== false || stripos($context, 'banner') !== false) {
        $prefix = 'hero';
    } elseif (stripos($context, 'service') !== false || stripos($text, 'offer') !== false) {
        $prefix = 'services';
    } elseif (stripos($context, 'portfolio') !== false || stripos($text, 'case') !== false) {
        $prefix = 'portfolio';
    } elseif (stripos($context, 'about') !== false || stripos($text, 'beginning') !== false) {
        $prefix = 'about';
    } elseif (stripos($context, 'feature') !== false || stripos($text, 'advantage') !== false) {
        $prefix = 'features';
    } elseif (stripos($context, 'team') !== false || stripos($text, 'designer') !== false) {
        $prefix = 'team';
    } elseif (stripos($context, 'faq') !== false || stripos($text, 'question') !== false) {
        $prefix = 'faq';
    } elseif (stripos($context, 'cta') !== false || stripos($text, 'call to action') !== false) {
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
        return null;
    }

    $content = file_get_contents($filePath);
    $lines = explode("\n", $content);

    // Find the line containing the search text
    $foundLine = -1;
    foreach ($lines as $index => $line) {
        if (stripos($line, $searchText) !== false) {
            $foundLine = $index;
            break;
        }
    }

    if ($foundLine === -1) {
        return null;
    }

    // Find the opening <section> tag before this line
    $sectionStart = -1;
    for ($i = $foundLine; $i >= 0; $i--) {
        if (preg_match('/<section[^>]*>/i', $lines[$i])) {
            $sectionStart = $i;
            break;
        }
    }

    if ($sectionStart === -1) {
        return null;
    }

    // Find the closing </section> tag after the opening
    $sectionEnd = -1;
    $depth = 0;
    for ($i = $sectionStart; $i < count($lines); $i++) {
        $line = $lines[$i];
        $depth += substr_count($line, '<section');
        $depth -= substr_count($line, '</section>');

        if ($depth === 0 && preg_match('/<\/section>/i', $line)) {
            $sectionEnd = $i;
            break;
        }
    }

    if ($sectionEnd === -1) {
        return null;
    }

    // Extract the section HTML
    $sectionLines = array_slice($lines, $sectionStart, $sectionEnd - $sectionStart + 1);
    $sectionHtml = implode("\n", $sectionLines);

    // Get context for naming (first 500 chars of section)
    $context = substr($sectionHtml, 0, 500);

    return [
        'html' => $sectionHtml,
        'context' => $context,
        'line_start' => $sectionStart + 1,
        'line_end' => $sectionEnd + 1,
    ];
}

// Process each database page
foreach ($searchMap as $dbPage => $files) {
    foreach ($files as $filename => $searchTexts) {
        $filePath = $baseDir.$filename;

        foreach ($searchTexts as $searchText) {
            $section = extractSection($filePath, $searchText);

            if ($section) {
                $sectionName = generateSectionName($searchText, $section['context'], $sectionCounter);

                $results[] = [
                    'database_page' => $dbPage,
                    'file' => $filename,
                    'original_text' => $searchText,
                    'section_name' => $sectionName,
                    'section_html_preview' => substr($section['html'], 0, 500).'...',
                    'section_html_full_length' => strlen($section['html']),
                    'line_start' => $section['line_start'],
                    'line_end' => $section['line_end'],
                ];
            } else {
                $results[] = [
                    'database_page' => $dbPage,
                    'file' => $filename,
                    'original_text' => $searchText,
                    'section_name' => 'NOT_FOUND',
                    'section_html_preview' => null,
                    'section_html_full_length' => 0,
                    'line_start' => null,
                    'line_end' => null,
                ];
            }
        }
    }
}

// Output as JSON
echo json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

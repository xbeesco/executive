<?php

$baseDir = 'D:/Server/exe-site/original/';
$outputDir = 'D:/Server/exe-site/extracted_sections/';

// Create output directory if it doesn't exist
if (! is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
}

// Read the extraction results
$jsonFile = 'D:/Server/exe-site/extracted_sections_complete.json';
if (! file_exists($jsonFile)) {
    exit("JSON file not found. Run extract_sections_v2.php first.\n");
}

$results = json_decode(file_get_contents($jsonFile), true);

$summary = [];
$createdFiles = [];

foreach ($results as $item) {
    if ($item['section_name'] === 'NOT_FOUND') {
        continue;
    }

    $filePath = $baseDir.$item['file'];

    if (! file_exists($filePath)) {
        continue;
    }

    // Read the file and extract the section
    $lines = file($filePath);
    $sectionLines = array_slice($lines, $item['line_start'] - 1, $item['line_end'] - $item['line_start'] + 1);
    $sectionHtml = implode('', $sectionLines);

    // Save to individual file
    $outputFilename = sprintf(
        'page-%d-%s.blade.php',
        $item['database_page'],
        $item['section_name']
    );
    $outputPath = $outputDir.$outputFilename;

    file_put_contents($outputPath, $sectionHtml);

    $createdFiles[] = $outputFilename;

    $summary[] = [
        'database_page' => $item['database_page'],
        'section_name' => $item['section_name'],
        'original_file' => $item['file'],
        'original_text' => $item['original_text'],
        'blade_file' => $outputFilename,
        'lines' => sprintf('%d-%d', $item['line_start'], $item['line_end']),
        'size' => strlen($sectionHtml),
    ];
}

// Save summary
file_put_contents(
    $outputDir.'SUMMARY.json',
    json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
);

// Create markdown summary
$markdown = "# Extracted Sections Summary\n\n";
$markdown .= 'Total sections extracted: '.count($summary)."\n\n";

$byPage = [];
foreach ($summary as $item) {
    $byPage[$item['database_page']][] = $item;
}

foreach ($byPage as $pageNum => $sections) {
    $markdown .= "## Database Page {$pageNum}\n\n";
    $markdown .= "| Section Name | Original File | Search Text | Blade File | Lines | Size |\n";
    $markdown .= "|--------------|---------------|-------------|------------|-------|------|\n";

    foreach ($sections as $section) {
        $markdown .= sprintf(
            "| %s | %s | %s | %s | %s | %s |\n",
            $section['section_name'],
            $section['original_file'],
            substr($section['original_text'], 0, 30).'...',
            $section['blade_file'],
            $section['lines'],
            number_format($section['size']).' bytes'
        );
    }
    $markdown .= "\n";
}

file_put_contents($outputDir.'SUMMARY.md', $markdown);

echo '✓ Extracted '.count($createdFiles)." sections\n";
echo "✓ Files saved to: {$outputDir}\n";
echo "✓ Summary saved to: SUMMARY.json and SUMMARY.md\n";
echo "\nExtracted sections:\n";
foreach ($createdFiles as $file) {
    echo "  - {$file}\n";
}

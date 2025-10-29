<?php

if (! function_exists('testRenderBlock')) {
    /**
     * Render a content block to HTML for testing and preview purposes.
     *
     * This helper renders any block type using the same infrastructure as the live site.
     * It includes comprehensive error handling with detailed debugging information.
     *
     * Usage:
     *   testRenderBlock('content_text', ['content' => '<p>Hello World</p>'])
     *   testRenderBlock('about', ['title' => 'About Us', 'content' => 'Story...'])
     *   testRenderBlock('--list')  // Show all available block types
     *
     * @param  string  $blockType  The block type (e.g., 'about', 'content_text')
     * @param  array  $data  The block data as associative array
     * @return string The rendered HTML or error information
     */
    function testRenderBlock(string $blockType, array $data = []): string
    {
        // Special command: List all available block types
        if ($blockType === '--list') {
            return _renderBlockList();
        }

        try {
            // Build the block structure
            $block = [
                'type' => $blockType,
                'data' => $data,
            ];

            // Get the view name using BlockViewMapper
            $mapper = app(\App\Services\BlockViewMapper::class);

            if (! $mapper->hasMapping($blockType)) {
                return _renderBlockNotFoundError($blockType, $mapper);
            }

            $viewName = $mapper->getViewName($blockType);

            // Check if view exists
            if (! view()->exists($viewName)) {
                return _renderViewNotFoundError($blockType, $viewName);
            }

            // Render the block
            ob_start();
            $startTime = microtime(true);

            $html = view($viewName, ['block' => $block])->render();

            $renderTime = round((microtime(true) - $startTime) * 1000, 2);
            ob_end_clean();

            // Return success with info
            return _renderSuccess($blockType, $viewName, $html, $renderTime);

        } catch (\Illuminate\View\ViewException $e) {
            return _renderViewException($e, $blockType, $data);
        } catch (\ErrorException $e) {
            return _renderPhpError($e, $blockType, $data);
        } catch (\Throwable $e) {
            return _renderGeneralException($e, $blockType, $data);
        }
    }
}

if (! function_exists('_renderSuccess')) {
    /**
     * Format successful render output with metadata.
     */
    function _renderSuccess(string $blockType, string $viewName, string $html, float $renderTime): string
    {
        $lines = substr_count($html, "\n") + 1;
        $size = strlen($html);
        $sizeFormatted = $size > 1024 ? round($size / 1024, 2).' KB' : $size.' B';

        $divider = str_repeat('━', 60);

        return "\n".
            "\033[32m✓ Block rendered successfully!\033[0m\n".
            "\n".
            "\033[1mBlock Type:\033[0m {$blockType}\n".
            "\033[1mView Used:\033[0m {$viewName}\n".
            "\033[1mHTML Lines:\033[0m {$lines}\n".
            "\033[1mOutput Size:\033[0m {$sizeFormatted}\n".
            "\033[1mRender Time:\033[0m {$renderTime}ms\n".
            "\n".
            "\033[1mHTML Output:\033[0m\n".
            $divider."\n".
            $html."\n".
            $divider."\n";
    }
}

if (! function_exists('_renderBlockNotFoundError')) {
    /**
     * Format block type not found error.
     */
    function _renderBlockNotFoundError(string $blockType, $mapper): string
    {
        $divider = str_repeat('━', 60);
        $allBlocks = array_keys($mapper->getAllMappings());

        // Find similar block names
        $suggestions = [];
        foreach ($allBlocks as $block) {
            similar_text($blockType, $block, $percent);
            if ($percent > 60) {
                $suggestions[] = $block;
            }
        }

        $output = "\n".
            "\033[31m❌ BLOCK TYPE NOT FOUND\033[0m\n".
            $divider."\n".
            "\n".
            "\033[1mError:\033[0m Block type '{$blockType}' is not defined in BlockViewMapper\n".
            "\n";

        if (! empty($suggestions)) {
            $output .= "\033[1m💡 Did you mean:\033[0m\n";
            foreach ($suggestions as $suggestion) {
                $output .= "  - {$suggestion}\n";
            }
            $output .= "\n";
        }

        $output .= "\033[1mAvailable block types:\033[0m Use testRenderBlock('--list') to see all ".count($allBlocks)." types\n";

        return $output;
    }
}

if (! function_exists('_renderViewNotFoundError')) {
    /**
     * Format view not found error.
     */
    function _renderViewNotFoundError(string $blockType, string $viewName): string
    {
        $divider = str_repeat('━', 60);
        $viewPath = str_replace('.', '/', $viewName).'.blade.php';
        $fullPath = resource_path('views/'.$viewPath);

        return "\n".
            "\033[31m❌ VIEW FILE NOT FOUND\033[0m\n".
            $divider."\n".
            "\n".
            "\033[1mError:\033[0m View file does not exist\n".
            "\n".
            "\033[1mBlock Type:\033[0m {$blockType}\n".
            "\033[1mExpected View:\033[0m {$viewName}\n".
            "\033[1mExpected Path:\033[0m {$fullPath}\n".
            "\n".
            "\033[1m💡 Suggestion:\033[0m\n".
            "  - Create the view file at the expected path\n".
            "  - Or update BlockViewMapper to point to the correct view\n".
            "\n";
    }
}

if (! function_exists('_renderViewException')) {
    /**
     * Format Blade/View exceptions with detailed context.
     */
    function _renderViewException(\Illuminate\View\ViewException $e, string $blockType, array $data): string
    {
        $divider = str_repeat('━', 60);
        $previous = $e->getPrevious() ?: $e;

        $message = $previous->getMessage();
        $file = $e->getFile();
        $line = $e->getLine();

        // Try to extract the actual blade file and line
        if (preg_match('/\.blade\.php/', $file)) {
            // This is already a blade file
            $bladeFile = $file;
            $bladeLine = $line;
        } else {
            // Try to find blade file in trace
            $trace = $e->getTrace();
            foreach ($trace as $item) {
                if (isset($item['file']) && str_contains($item['file'], '.blade.php')) {
                    $bladeFile = $item['file'];
                    $bladeLine = $item['line'] ?? '?';
                    break;
                }
            }
        }

        $output = "\n".
            "\033[31m❌ BLADE/VIEW ERROR\033[0m\n".
            $divider."\n".
            "\n".
            "\033[1mError:\033[0m {$message}\n".
            "\n".
            "\033[1mBlock Type:\033[0m {$blockType}\n";

        if (isset($bladeFile)) {
            $output .= "\033[1mFile:\033[0m {$bladeFile}\n";
            $output .= "\033[1mLine:\033[0m {$bladeLine}\n";

            // Try to show code context
            if (file_exists($bladeFile)) {
                $output .= "\n\033[1mCode Context:\033[0m\n";
                $output .= _getFileContext($bladeFile, $bladeLine);
            }
        }

        $output .= "\n\033[1mBlock Data Received:\033[0m\n";
        $output .= json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)."\n";

        $output .= "\n\033[1mStack Trace:\033[0m\n";
        $output .= _formatStackTrace($e->getTrace(), 5);

        return $output;
    }
}

if (! function_exists('_renderPhpError')) {
    /**
     * Format PHP errors (undefined variables, etc).
     */
    function _renderPhpError(\ErrorException $e, string $blockType, array $data): string
    {
        $divider = str_repeat('━', 60);

        $output = "\n".
            "\033[31m❌ PHP ERROR\033[0m\n".
            $divider."\n".
            "\n".
            "\033[1mError:\033[0m {$e->getMessage()}\n".
            "\n".
            "\033[1mBlock Type:\033[0m {$blockType}\n".
            "\033[1mFile:\033[0m {$e->getFile()}\n".
            "\033[1mLine:\033[0m {$e->getLine()}\n";

        if (file_exists($e->getFile())) {
            $output .= "\n\033[1mCode Context:\033[0m\n";
            $output .= _getFileContext($e->getFile(), $e->getLine());
        }

        $output .= "\n\033[1mBlock Data Received:\033[0m\n";
        $output .= json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)."\n";

        $output .= "\n\033[1mStack Trace:\033[0m\n";
        $output .= _formatStackTrace($e->getTrace(), 5);

        return $output;
    }
}

if (! function_exists('_renderGeneralException')) {
    /**
     * Format general exceptions.
     */
    function _renderGeneralException(\Throwable $e, string $blockType, array $data): string
    {
        $divider = str_repeat('━', 60);

        $output = "\n".
            "\033[31m❌ ".strtoupper(class_basename($e))."\033[0m\n".
            $divider."\n".
            "\n".
            "\033[1mError:\033[0m {$e->getMessage()}\n".
            "\n".
            "\033[1mBlock Type:\033[0m {$blockType}\n".
            "\033[1mFile:\033[0m {$e->getFile()}\n".
            "\033[1mLine:\033[0m {$e->getLine()}\n";

        if (file_exists($e->getFile())) {
            $output .= "\n\033[1mCode Context:\033[0m\n";
            $output .= _getFileContext($e->getFile(), $e->getLine());
        }

        $output .= "\n\033[1mBlock Data Received:\033[0m\n";
        $output .= json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)."\n";

        $output .= "\n\033[1mStack Trace:\033[0m\n";
        $output .= _formatStackTrace($e->getTrace(), 10);

        return $output;
    }
}

if (! function_exists('_getFileContext')) {
    /**
     * Get code context around an error line.
     */
    function _getFileContext(string $file, int $line, int $contextLines = 3): string
    {
        if (! file_exists($file)) {
            return "  [File not accessible]\n";
        }

        $lines = file($file);
        $start = max(0, $line - $contextLines - 1);
        $end = min(count($lines), $line + $contextLines);

        $output = '';
        for ($i = $start; $i < $end; $i++) {
            $lineNum = $i + 1;
            $content = rtrim($lines[$i]);

            if ($lineNum === $line) {
                $output .= sprintf("  \033[31m> %d: %s\033[0m\n", $lineNum, $content);
            } else {
                $output .= sprintf("    %d: %s\n", $lineNum, $content);
            }
        }

        return $output;
    }
}

if (! function_exists('_formatStackTrace')) {
    /**
     * Format stack trace for display.
     */
    function _formatStackTrace(array $trace, int $limit = 5): string
    {
        $output = '';
        $count = 0;

        foreach ($trace as $i => $item) {
            if ($count >= $limit) {
                break;
            }

            $file = $item['file'] ?? '[internal]';
            $line = $item['line'] ?? '?';
            $function = $item['function'] ?? '';
            $class = $item['class'] ?? '';

            if ($class) {
                $function = $class.$function;
            }

            $output .= sprintf("  #%d %s:%s\n", $i, $file, $line);
            if ($function) {
                $output .= sprintf("      %s()\n", $function);
            }

            $count++;
        }

        return $output;
    }
}

if (! function_exists('_renderBlockList')) {
    /**
     * Render list of all available block types.
     */
    function _renderBlockList(): string
    {
        $mapper = app(\App\Services\BlockViewMapper::class);
        $allMappings = $mapper->getAllMappings();

        // Categorize blocks
        $categories = [
            'Content Blocks' => [],
            'Section Blocks' => [],
            'Dynamic Blocks' => [],
            'Other Blocks' => [],
        ];

        foreach ($allMappings as $type => $view) {
            if (str_starts_with($type, 'content_')) {
                $categories['Content Blocks'][] = $type;
            } elseif (in_array($type, ['posts_grid', 'events_grid'])) {
                $categories['Dynamic Blocks'][] = $type;
            } elseif (in_array($type, ['spacer'])) {
                $categories['Other Blocks'][] = $type;
            } else {
                $categories['Section Blocks'][] = $type;
            }
        }

        $divider = str_repeat('━', 60);
        $total = count($allMappings);

        $output = "\n".
            "\033[32m📦 Available Block Types ({$total} total)\033[0m\n".
            $divider."\n";

        foreach ($categories as $category => $blocks) {
            if (empty($blocks)) {
                continue;
            }

            sort($blocks);
            $count = count($blocks);

            $output .= "\n\033[1m{$category}\033[0m ({$count})\n";
            foreach ($blocks as $block) {
                $view = $allMappings[$block];
                $output .= sprintf("  - \033[36m%-30s\033[0m %s\n", $block, $view);
            }
        }

        $output .= "\n".
            "\033[1mUsage:\033[0m\n".
            "  testRenderBlock('block_type', ['data_key' => 'value'])\n".
            "\n".
            "\033[1mExample:\033[0m\n".
            "  testRenderBlock('content_text', ['content' => '<p>Hello World</p>'])\n".
            "\n";

        return $output;
    }
}

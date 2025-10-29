<?php

namespace App\Console\Commands;

use App\Services\Schemas\ContentBuilderSchema;
use Illuminate\Console\Command;

class ValidateContentBuilderSchema extends Command
{
    protected $signature = 'validate:schema';

    protected $description = 'Validate ContentBuilderSchema for errors';

    public function handle(): int
    {
        $this->info('🔍 Validating ContentBuilderSchema...');
        $this->newLine();

        try {
            // Try to get blocks
            $blocks = ContentBuilderSchema::getBlocks();

            $this->info('✅ Schema loaded successfully!');
            $this->info('📦 Total blocks: ' . count($blocks));
            $this->newLine();

            // List all blocks
            $this->table(
                ['#', 'Type', 'Label'],
                collect($blocks)->map(function ($block, $index) {
                    return [
                        $index + 1,
                        $block->getName(),
                        $block->getLabel(),
                    ];
                })->toArray()
            );

            $this->newLine();
            $this->info('🎉 All validations passed!');

            return self::SUCCESS;

        } catch (\Throwable $e) {
            $this->newLine();
            $this->error('❌ Validation failed!');
            $this->error('Error: ' . $e->getMessage());
            $this->error('File: ' . $e->getFile() . ':' . $e->getLine());

            if ($this->option('verbose')) {
                $this->newLine();
                $this->line('Stack trace:');
                $this->line($e->getTraceAsString());
            }

            return self::FAILURE;
        }
    }
}

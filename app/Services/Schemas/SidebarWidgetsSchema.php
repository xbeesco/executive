<?php

namespace App\Services\Schemas;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class SidebarWidgetsSchema
{
    /**
     * Get all sidebar widget blocks
     */
    public static function getWidgetBlocks(): array
    {
        return [
            Block::make('services_list')
                ->label('Services List')
                ->icon('heroicon-o-list-bullet')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Our Services')
                        ->required()
                        ->columnSpan(12),

                    TextInput::make('count')
                        ->label('Items Count')
                        ->numeric()
                        ->default(6)
                        ->minValue(1)
                        ->maxValue(20)
                        ->columnSpan(12),
                ]),

            Block::make('recent_items')
                ->label('Recent Posts')
                ->icon('heroicon-o-clock')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Recent Posts')
                        ->required()
                        ->columnSpan(12),

                    TextInput::make('count')
                        ->label('Items Count')
                        ->numeric()
                        ->default(5)
                        ->minValue(1)
                        ->maxValue(20)
                        ->columnSpan(12),
                ]),

            Block::make('categories')
                ->label('Categories')
                ->icon('heroicon-o-folder')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Categories')
                        ->required()
                        ->columnSpan(12),
                ]),

            Block::make('tags')
                ->label('Tags Cloud')
                ->icon('heroicon-o-tag')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Popular Tags')
                        ->required()
                        ->columnSpan(12),

                    TextInput::make('count')
                        ->label('Max Tags')
                        ->numeric()
                        ->default(15)
                        ->minValue(5)
                        ->maxValue(30)
                        ->columnSpan(12),
                ]),

            Block::make('call_to_action')
                ->label('Call to Action')
                ->icon('heroicon-o-megaphone')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Main Title')
                        ->default('Call to Action')
                        ->required()
                        ->columnSpan(12),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->default('Ready to start?')
                        ->columnSpan(12),

                    TextInput::make('cta_text')
                        ->label('CTA Text')
                        ->default('Contact us now!')
                        ->columnSpan(12),

                    FileUpload::make('background_image')
                        ->label('Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('widgets/cta')
                        ->visibility('public')
                        ->helperText('Background image for the CTA widget')
                        ->columnSpan(12),

                    TextInput::make('button_text')
                        ->label('Button Text')
                        ->default('Get Started')
                        ->columnSpan(6),

                    TextInput::make('button_link')
                        ->label('Button Link')
                        ->url()
                        ->default('#')
                        ->columnSpan(6),
                ]),

            Block::make('events_upcoming')
                ->label('Upcoming Events')
                ->icon('heroicon-o-calendar')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Upcoming Events')
                        ->required()
                        ->columnSpan(12),

                    Select::make('event_type')
                        ->label('Event Type')
                        ->options([
                            'upcoming' => 'Upcoming Events Only',
                            'all' => 'All Published Events',
                        ])
                        ->default('upcoming')
                        ->required()
                        ->columnSpan(6),

                    TextInput::make('count')
                        ->label('Items Count')
                        ->numeric()
                        ->default(5)
                        ->minValue(1)
                        ->maxValue(10)
                        ->columnSpan(6),
                ]),

            Block::make('download')
                ->label('Download / Company Profile')
                ->icon('heroicon-o-arrow-down-tray')
                ->columns(12)
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Company Profile')
                        ->required()
                        ->columnSpan(12),

                    FileUpload::make('pdf_file')
                        ->label('PDF File')
                        ->acceptedFileTypes(['application/pdf'])
                        ->disk('public')
                        ->directory('downloads')
                        ->visibility('public')
                        ->columnSpan(12),

                    TextInput::make('pdf_label')
                        ->label('PDF Link Text')
                        ->default('Download PDF File')
                        ->columnSpan(12),

                    FileUpload::make('doc_file')
                        ->label('Word Document')
                        ->acceptedFileTypes([
                            'application/msword',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        ])
                        ->disk('public')
                        ->directory('downloads')
                        ->visibility('public')
                        ->columnSpan(12),

                    TextInput::make('doc_label')
                        ->label('Document Link Text')
                        ->default('Download Word File')
                        ->columnSpan(12),
                ]),
        ];
    }
}

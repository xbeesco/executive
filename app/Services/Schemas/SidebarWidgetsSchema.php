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
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Our Services')
                        ->required(),

                    TextInput::make('count')
                        ->label('Items Count')
                        ->numeric()
                        ->default(6)
                        ->minValue(1)
                        ->maxValue(20),
                ]),

            Block::make('recent_items')
                ->label('Recent Posts')
                ->icon('heroicon-o-clock')
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Recent Posts')
                        ->required(),

                    TextInput::make('count')
                        ->label('Items Count')
                        ->numeric()
                        ->default(5)
                        ->minValue(1)
                        ->maxValue(20),
                ]),

            Block::make('categories')
                ->label('Categories')
                ->icon('heroicon-o-folder')
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Categories')
                        ->required(),
                ]),

            Block::make('tags')
                ->label('Tags Cloud')
                ->icon('heroicon-o-tag')
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Popular Tags')
                        ->required(),

                    TextInput::make('count')
                        ->label('Max Tags')
                        ->numeric()
                        ->default(15)
                        ->minValue(5)
                        ->maxValue(30),
                ]),

            Block::make('call_to_action')
                ->label('Call to Action')
                ->icon('heroicon-o-megaphone')
                ->schema([
                    TextInput::make('title')
                        ->label('Main Title')
                        ->default('Call to Action')
                        ->required(),

                    TextInput::make('subtitle')
                        ->label('Subtitle')
                        ->default('Ready to start?'),

                    TextInput::make('cta_text')
                        ->label('CTA Text')
                        ->default('Contact us now!'),

                    FileUpload::make('background_image')
                        ->label('Background Image')
                        ->image()
                        ->disk('public')
                        ->directory('widgets/cta')
                        ->visibility('public')
                        ->helperText('Background image for the CTA widget'),

                    TextInput::make('button_text')
                        ->label('Button Text')
                        ->default('Get Started'),

                    TextInput::make('button_link')
                        ->label('Button Link')
                        ->url()
                        ->default('#'),
                ]),

            Block::make('events_upcoming')
                ->label('Upcoming Events')
                ->icon('heroicon-o-calendar')
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Upcoming Events')
                        ->required(),

                    Select::make('event_type')
                        ->label('Event Type')
                        ->options([
                            'upcoming' => 'Upcoming Events Only',
                            'all' => 'All Published Events',
                        ])
                        ->default('upcoming')
                        ->required(),

                    TextInput::make('count')
                        ->label('Items Count')
                        ->numeric()
                        ->default(5)
                        ->minValue(1)
                        ->maxValue(10),
                ]),

            Block::make('download')
                ->label('Download / Company Profile')
                ->icon('heroicon-o-arrow-down-tray')
                ->schema([
                    TextInput::make('title')
                        ->label('Widget Title')
                        ->default('Company Profile')
                        ->required(),

                    FileUpload::make('pdf_file')
                        ->label('PDF File')
                        ->acceptedFileTypes(['application/pdf'])
                        ->disk('public')
                        ->directory('downloads')
                        ->visibility('public'),

                    TextInput::make('pdf_label')
                        ->label('PDF Link Text')
                        ->default('Download PDF File'),

                    FileUpload::make('doc_file')
                        ->label('Word Document')
                        ->acceptedFileTypes([
                            'application/msword',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        ])
                        ->disk('public')
                        ->directory('downloads')
                        ->visibility('public'),

                    TextInput::make('doc_label')
                        ->label('Document Link Text')
                        ->default('Download Word File'),
                ]),
        ];
    }
}

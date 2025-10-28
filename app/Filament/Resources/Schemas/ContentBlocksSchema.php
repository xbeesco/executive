<?php

namespace App\Filament\Resources\Schemas;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class ContentBlocksSchema
{
    /**
     * Get all content blocks for single pages (without section wrappers)
     */
    public static function getContentBlocks(): array
    {
        return [
            Block::make('content_text')
                ->label('Text Content')
                ->icon('heroicon-o-document-text')
                ->schema([
                    RichEditor::make('content')
                        ->label('Content')
                        ->required()
                        ->toolbarButtons([
                            'blockquote',
                            'bold',
                            'bulletList',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ]),
                ]),

            Block::make('content_image')
                ->label('Image')
                ->icon('heroicon-o-photo')
                ->schema([
                    FileUpload::make('image')
                        ->label('Image')
                        ->image()
                        ->disk('public')
                        ->directory('images/content')
                        ->imageEditor()
                        ->required(),

                    TextInput::make('alt_text')
                        ->label('Alt Text')
                        ->maxLength(255),

                    TextInput::make('caption')
                        ->label('Caption')
                        ->maxLength(255),

                    Select::make('alignment')
                        ->label('Alignment')
                        ->options([
                            'text-start' => 'Left',
                            'text-center' => 'Center',
                            'text-end' => 'Right',
                        ])
                        ->default('text-center'),

                    Select::make('size')
                        ->label('Size')
                        ->options([
                            'w-100' => 'Full Width',
                            'w-75' => '75%',
                            'w-50' => '50%',
                            'w-25' => '25%',
                        ])
                        ->default('w-100'),
                ]),

            Block::make('content_gallery')
                ->label('Image Gallery')
                ->icon('heroicon-o-photo')
                ->schema([
                    Repeater::make('images')
                        ->label('Images')
                        ->schema([
                            FileUpload::make('image')
                                ->label('Image')
                                ->image()
                                ->disk('public')
                                ->directory('images/gallery')
                                ->imageEditor()
                                ->required(),

                            TextInput::make('alt_text')
                                ->label('Alt Text'),

                            TextInput::make('caption')
                                ->label('Caption'),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['caption'] ?? null),

                    Select::make('columns')
                        ->label('Columns per Row')
                        ->options([
                            '12' => '1 Column',
                            '6' => '2 Columns',
                            '4' => '3 Columns',
                            '3' => '4 Columns',
                        ])
                        ->default('4'),
                ]),

            Block::make('content_list')
                ->label('List')
                ->icon('heroicon-o-list-bullet')
                ->schema([
                    Select::make('list_type')
                        ->label('List Type')
                        ->options([
                            'unordered' => 'Bullet List',
                            'ordered' => 'Numbered List',
                        ])
                        ->default('unordered')
                        ->required(),

                    Select::make('list_style')
                        ->label('List Style')
                        ->options([
                            'default' => 'Default',
                            'unstyled' => 'No Markers',
                        ])
                        ->default('default'),

                    Repeater::make('items')
                        ->label('List Items')
                        ->schema([
                            TextInput::make('text')
                                ->label('Item Text')
                                ->required(),

                            TextInput::make('icon')
                                ->label('Icon Class (Optional)')
                                ->helperText('FontAwesome or Bootstrap icon class'),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['text'] ?? null)
                        ->required()
                        ->minItems(1),
                ]),

            Block::make('content_quote')
                ->label('Quote')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->schema([
                    Textarea::make('quote')
                        ->label('Quote Text')
                        ->required()
                        ->rows(3),

                    TextInput::make('author')
                        ->label('Author Name'),

                    TextInput::make('author_title')
                        ->label('Author Title/Position'),
                ]),

            Block::make('content_accordion')
                ->label('Accordion')
                ->icon('heroicon-o-bars-3-bottom-left')
                ->schema([
                    Repeater::make('items')
                        ->label('Accordion Items')
                        ->schema([
                            TextInput::make('title')
                                ->label('Title')
                                ->required(),

                            TextInput::make('icon')
                                ->label('Icon Class (Optional)')
                                ->helperText('FontAwesome or Bootstrap icon class'),

                            RichEditor::make('content')
                                ->label('Content')
                                ->required()
                                ->toolbarButtons([
                                    'bold',
                                    'bulletList',
                                    'italic',
                                    'link',
                                    'orderedList',
                                ]),
                        ])
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                        ->required()
                        ->minItems(1),
                ]),

            Block::make('content_video')
                ->label('Video')
                ->icon('heroicon-o-video-camera')
                ->schema([
                    Select::make('video_type')
                        ->label('Video Type')
                        ->options([
                            'youtube' => 'YouTube',
                            'vimeo' => 'Vimeo',
                            'embed' => 'Direct Embed URL',
                        ])
                        ->default('youtube')
                        ->required()
                        ->reactive(),

                    TextInput::make('video_url')
                        ->label('Video URL')
                        ->url()
                        ->required()
                        ->helperText(function ($get) {
                            $type = $get('video_type');
                            if ($type === 'youtube') {
                                return 'Example: https://www.youtube.com/watch?v=VIDEO_ID';
                            } elseif ($type === 'vimeo') {
                                return 'Example: https://vimeo.com/VIDEO_ID';
                            }

                            return 'Direct embed URL (e.g., from iframe src)';
                        }),

                    TextInput::make('title')
                        ->label('Video Title'),

                    TextInput::make('caption')
                        ->label('Caption'),
                ]),

            Block::make('content_divider')
                ->label('Divider')
                ->icon('heroicon-o-minus')
                ->schema([
                    Select::make('style')
                        ->label('Line Style')
                        ->options([
                            'solid' => 'Solid',
                            'dashed' => 'Dashed',
                            'dotted' => 'Dotted',
                        ])
                        ->default('solid'),

                    Select::make('color')
                        ->label('Color')
                        ->options([
                            'primary' => 'Primary',
                            'secondary' => 'Secondary',
                            'dark' => 'Dark',
                            'light' => 'Light',
                        ])
                        ->default('secondary'),

                    TextInput::make('thickness')
                        ->label('Thickness (px)')
                        ->numeric()
                        ->default(1)
                        ->minValue(1)
                        ->maxValue(10),

                    TextInput::make('width')
                        ->label('Width (%)')
                        ->numeric()
                        ->default(100)
                        ->minValue(10)
                        ->maxValue(100),

                    TextInput::make('opacity')
                        ->label('Opacity')
                        ->numeric()
                        ->default(25)
                        ->minValue(10)
                        ->maxValue(100),

                    TextInput::make('text')
                        ->label('Text (Optional)')
                        ->helperText('Text to display in the middle of divider'),
                ]),
        ];
    }
}

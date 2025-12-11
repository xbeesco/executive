<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Enums\ArchiveContentType;
use App\Enums\ArchiveTemplate;
use App\Enums\ContentStatus;
use App\Services\Schemas\ContentBuilderSchema;
use Filament\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Size;
use Filament\Support\Icons\Heroicon;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Content Builder Section - 8 Columns
                Section::make('Page Content')
                    ->schema([
                        Builder::make('content')
                            ->blocks(ContentBuilderSchema::getBlocks())
                            ->cloneable()
                            ->collapsed()
                            ->collapsible()
                            ->extraItemActions([
                                Action::make('copyToClipboard')
                                    ->label('Copy Block')
                                    ->icon(Heroicon::ClipboardDocument)
                                    ->color('gray')
                                    ->size(Size::Small)
                                    ->action(function (array $arguments, Builder $component): void {
                                        $items = $component->getRawState();
                                        $blockData = $items[$arguments['item']] ?? null;

                                        if (!$blockData) {
                                            Notification::make()
                                                ->danger()
                                                ->title('Error')
                                                ->body('Block not found')
                                                ->send();
                                            return;
                                        }

                                        $component->getLivewire()->dispatch(
                                            'copy-block-to-clipboard',
                                            blockData: json_encode($blockData, JSON_UNESCAPED_UNICODE)
                                        );

                                        Notification::make()
                                            ->success()
                                            ->title('Block Copied!')
                                            ->send();
                                    }),
                            ])
                            ->addActionLabel('Add Block'),
                    ])
                    ->columnSpan(8),

                // Sidebar - 4 Columns with Tabs (no Section wrapper)
                Tabs::make('Settings')
                    ->columnSpan(4)
                    ->tabs([
                        // General Tab
                        Tabs\Tab::make('General')
                            ->icon(Heroicon::Cog6Tooth)
                            ->schema([
                                        TextInput::make('title')
                                            ->label('Title')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true),

                                        TextInput::make('slug')
                                            ->label('Slug')
                                            ->required()
                                            ->unique('pages', 'slug', ignoreRecord: true)
                                            ->maxLength(255),

                                        Select::make('status')
                                            ->label('Status')
                                            ->options(ContentStatus::class)
                                            ->required()
                                            ->selectablePlaceholder(false),

                                        Select::make('settings.is_archive')
                                            ->label('Archive Page')
                                            ->options([
                                                0 => 'No',
                                                1 => 'Yes',
                                            ])
                                            ->default(0)
                                            ->selectablePlaceholder(false)
                                            ->live(),

                                        Select::make('settings.archive_content_type')
                                            ->label('Archive Content')
                                            ->options(ArchiveContentType::class)
                                            ->selectablePlaceholder(false)
                                            ->hidden(fn ($get) => ! $get('settings.is_archive')),

                                        Select::make('settings.archive_template')
                                            ->label('Archive Template')
                                            ->options(ArchiveTemplate::class)
                                            ->selectablePlaceholder(false)
                                            ->hidden(fn ($get) => ! $get('settings.is_archive')),

                                        FileUpload::make('featured_image')
                                            ->label('Featured Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images/pages'),
                                    ]),

                                // Design Tab
                                Tabs\Tab::make('Design')
                                    ->icon(Heroicon::PaintBrush)
                                    ->schema([
                                        Select::make('settings.header_style')
                                            ->label('Header Style')
                                            ->options([
                                                3 => '1',
                                                4 => '2',
                                                8 => '3',
                                            ])
                                            ->required()
                                            ->default(3)
                                            ->selectablePlaceholder(false),

                                        Select::make('settings.header_area_type')
                                            ->label('Header Area')
                                            ->options([
                                                'none' => 'None',
                                                'slider' => 'Slider',
                                            ])
                                            ->required()
                                            ->default('none')
                                            ->selectablePlaceholder(false)
                                            ->live(),

                                        Repeater::make('settings.slider_items')
                                            ->label('Slider Items')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Main Title')
                                                    ->required()
                                                    ->maxLength(255),

                                                FileUpload::make('background_image')
                                                    ->label('Background Image')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('sliders'),

                                                TextInput::make('sub_title')
                                                    ->label('Sub Title')
                                                    ->maxLength(255),

                                                Textarea::make('description')
                                                    ->label('Description')
                                                    ->maxLength(500)
                                                    ->trim()
                                                    ->rows(1)
                                                    ->autosize(),

                                                TextInput::make('button_text')
                                                    ->label('Button Text')
                                                    ->maxLength(100),

                                                TextInput::make('button_url')
                                                    ->label('Button URL')
                                                    ->url()
                                                    ->maxLength(255),
                                            ])
                                            ->minItems(2)
                                            ->maxItems(3)
                                            ->cloneable()
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Slide')
                                            ->hidden(fn ($get) => $get('settings.header_area_type') !== 'slider'),

                                        Select::make('settings.footer_style')
                                            ->label('Footer Style')
                                            ->options([
                                                1 => '1',
                                                2 => '2',
                                                3 => '3',
                                            ])
                                            ->required()
                                            ->default(2)
                                            ->selectablePlaceholder(false),

                                        Select::make('settings.footer_bg_color')
                                            ->label('Footer Color')
                                            ->options([
                                                'secondary' => 'Secondary',
                                                'light' => 'Light',
                                                'dark' => 'Dark',
                                            ])
                                            ->required()
                                            ->default('secondary')
                                            ->selectablePlaceholder(false),

                                        Select::make('settings.container_type')
                                            ->label('Container Type')
                                            ->options([
                                                'container' => 'Container',
                                                'container-fluid' => 'Container Fluid',
                                            ])
                                            ->default('container')
                                            ->selectablePlaceholder(false),

                                        Select::make('settings.show_sidebar')
                                            ->label('Show Sidebar')
                                            ->options([
                                                0 => 'No',
                                                1 => 'Yes',
                                            ])
                                            ->default(0)
                                            ->selectablePlaceholder(false)
                                            ->live(),

                                        Select::make('settings.sidebar_position')
                                            ->label('Sidebar Position')
                                            ->options([
                                                'left' => 'Left',
                                                'right' => 'Right',
                                            ])
                                            ->default('right')
                                            ->selectablePlaceholder(false)
                                            ->hidden(fn ($get) => ! $get('settings.show_sidebar')),

                                        Toggle::make('settings.use_demo_sections')
                                            ->label('Enable Demo Version of Sections')
                                            ->default(false),
                                    ]),

                                // SEO Tab
                                Tabs\Tab::make('SEO')
                                    ->icon(Heroicon::MagnifyingGlass)
                                    ->schema([
                                        TextInput::make('seo.meta_title')
                                            ->label('Meta Title')
                                            ->maxLength(60),

                                        TextInput::make('seo.meta_keywords')
                                            ->label('Meta Keywords'),

                                        TextInput::make('seo.meta_description')
                                            ->label('Meta Description')
                                            ->maxLength(160),

                                        FileUpload::make('seo.og_image')
                                            ->label('Open Graph Image')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images/seo'),
                                    ]),
                            ]),
            ]);
    }
}

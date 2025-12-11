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
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Support\Enums\Size;
use Filament\Support\Icons\Heroicon;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                Section::make('Content Builder')
                    ->schema([
                        Builder::make('content')
                            ->blocks(ContentBuilderSchema::getBlocks())
                            ->hiddenLabel()
                            ->cloneable()
                            ->collapsed()
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
                    ->columnSpan(7),

                // Sidebar - 4 Columns with Tabs
                Tabs::make('Settings')
                    ->columnSpan(5)
                    ->columns(12)
                    ->tabs([
                        // General Tab
                        Tabs\Tab::make('General')
                            ->icon(Heroicon::Cog6Tooth)
                            ->columns(12)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                        if (($get("slug") ?? "") !== Str::slug($old)) {
                                            return;
                                        }
                                        $set("slug", Str::slug($state));
                                    })
                                    ->columnSpan(6),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->unique('pages', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                Select::make('status')
                                    ->label('Status')
                                    ->options(ContentStatus::class)
                                    ->required()
                                    ->selectablePlaceholder(false)
                                    ->columnSpan(6),

                                Select::make('settings.is_archive')
                                    ->label('Archive Page')
                                    ->options([
                                        0 => 'No',
                                        1 => 'Yes',
                                    ])
                                    ->default(0)
                                    ->selectablePlaceholder(false)
                                    ->live()
                                    ->columnSpan(6),

                                Select::make('settings.archive_content_type')
                                    ->label('Archive Content')
                                    ->options(ArchiveContentType::class)
                                    ->selectablePlaceholder(false)
                                    ->hidden(fn ($get) => ! $get('settings.is_archive'))
                                    ->columnSpan(6),

                                Select::make('settings.archive_template')
                                    ->label('Archive Template')
                                    ->options(ArchiveTemplate::class)
                                    ->selectablePlaceholder(false)
                                    ->hidden(fn ($get) => ! $get('settings.is_archive'))
                                    ->columnSpan(12),

                                FileUpload::make('featured_image')
                                    ->label('Featured Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/pages')
                                    ->columnSpan(12),
                                
                                Toggle::make('settings.use_demo_sections')
                                    ->label('Enable Demo Version of Sections')
                                    ->default(false)
                                    ->columnSpan(12),

                            ]),

                        // Design Tab
                        Tabs\Tab::make('Design')
                            ->icon(Heroicon::PaintBrush)
                            ->columns(12)
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
                                    ->selectablePlaceholder(false)
                                    ->columnSpan(6),

                                Select::make('settings.header_area_type')
                                    ->label('Header Area')
                                    ->options([
                                        'none' => 'None',
                                        'slider' => 'Slider',
                                    ])
                                    ->required()
                                    ->default('none')
                                    ->selectablePlaceholder(false)
                                    ->live()
                                    ->columnSpan(6),

                                Repeater::make('settings.slider_items')
                                    ->label('Slider Items')
                                    ->hiddenLabel()
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Main Title1')
                                            ->required()
                                            ->columnSpan(5)
                                            ->maxLength(255),
                                        
                                        TextInput::make('sub_title')
                                            ->label('Sub Title')
                                            ->columnSpan(7)
                                            ->maxLength(255),

                                        FileUpload::make('background_image')
                                            ->label('Background Image')
                                            ->image()
                                            ->columnSpan(12)
                                            ->disk('public')
                                            ->directory('sliders'),

                                        Textarea::make('description')
                                            ->label('Description')
                                            ->maxLength(500)
                                            ->trim()
                                            ->rows(1)
                                            ->columnSpan(12)
                                            ->autosize(),

                                        TextInput::make('button_text')
                                            ->label('Button Text')
                                            ->columnSpan(6)
                                            ->maxLength(100),

                                        TextInput::make('button_url')
                                            ->label('Button URL')
                                            ->url()
                                            ->columnSpan(6)
                                            ->maxLength(255),
                                    ])
                                    ->minItems(2)
                                    ->maxItems(3)
                                    ->cloneable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Slide')
                                    ->hidden(fn ($get) => $get('settings.header_area_type') !== 'slider')
                                    ->columns(12)
                                    ->columnSpan(12),

                                Select::make('settings.footer_style')
                                    ->label('Footer Style')
                                    ->options([
                                        1 => '1',
                                        2 => '2',
                                        3 => '3',
                                    ])
                                    ->required()
                                    ->default(2)
                                    ->selectablePlaceholder(false)
                                    ->columnSpan(6),

                                Select::make('settings.footer_bg_color')
                                    ->label('Footer Color')
                                    ->options([
                                        'secondary' => 'Secondary',
                                        'light' => 'Light',
                                        'dark' => 'Dark',
                                    ])
                                    ->required()
                                    ->default('secondary')
                                    ->selectablePlaceholder(false)
                                    ->columnSpan(6),

                                Select::make('settings.container_type')
                                    ->label('Container Type')
                                    ->options([
                                        'container' => 'Container',
                                        'container-fluid' => 'Container Fluid',
                                    ])
                                    ->default('container')
                                    ->selectablePlaceholder(false)
                                    ->columnSpan(6),

                                Select::make('settings.show_sidebar')
                                    ->label('Show Sidebar')
                                    ->options([
                                        0 => 'No',
                                        1 => 'Yes',
                                    ])
                                    ->default(0)
                                    ->selectablePlaceholder(false)
                                    ->live()
                                    ->columnSpan(6),

                                Select::make('settings.sidebar_position')
                                    ->label('Sidebar Position')
                                    ->options([
                                        'left' => 'Left',
                                        'right' => 'Right',
                                    ])
                                    ->default('right')
                                    ->selectablePlaceholder(false)
                                    ->hidden(fn ($get) => ! $get('settings.show_sidebar'))
                                    ->columnSpan(6),

                            ]),

                        
                        Tabs\Tab::make('SEO')
                            ->icon(Heroicon::MagnifyingGlass)
                            ->columns(12)
                            ->schema([
                                TextInput::make('seo.meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(60)
                                    ->columnSpan(12),

                                TextInput::make('seo.meta_keywords')
                                    ->label('Meta Keywords')
                                    ->columnSpan(12),

                                TextInput::make('seo.meta_description')
                                    ->label('Meta Description')
                                    ->maxLength(160)
                                    ->columnSpan(12),

                                FileUpload::make('seo.og_image')
                                    ->label('Open Graph Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/seo')
                                    ->columnSpan(12),
                            ]),
                    ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Enums\ContentStatus;
use App\Services\Schemas\ContentBuilderSchema;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\Action;
use Filament\Support\Enums\Size;
use Filament\Notifications\Notification;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 7 Columns
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

                // Sidebar - 5 Columns with Tabs
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
                                    ->unique('services', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('Auto-generated from title')
                                    ->columnSpan(6),

                                Select::make('status')
                                    ->label('Status')
                                    ->options(ContentStatus::class)
                                    ->required()
                                    ->selectablePlaceholder(false)
                                    ->default(ContentStatus::DRAFT->value)
                                    ->columnSpan(6),

                                TextInput::make('icon')
                                    ->label('Icon')
                                    ->placeholder('fas fa-rocket')
                                    ->helperText('Font Awesome icon class')
                                    ->columnSpan(6),

                                Textarea::make('excerpt')
                                    ->label('Excerpt')
                                    ->rows(3)
                                    ->maxLength(500)
                                    ->helperText('Brief service description')
                                    ->columnSpan(12),

                                FileUpload::make('featured_image')
                                    ->label('Featured Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images/services')
                                    ->columnSpan(12),
                            ]),

                        // Features Tab
                        Tabs\Tab::make('Features')
                            ->icon(Heroicon::ListBullet)
                            ->columns(12)
                            ->schema([
                                Repeater::make('features')
                                    ->label('')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Feature Name')
                                            ->required(),

                                        TextInput::make('icon')
                                            ->label('Icon')
                                            ->default('fas fa-check')
                                            ->placeholder('fas fa-check'),
                                    ])
                                    ->addActionLabel('Add Feature')
                                    ->reorderable()
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Feature')
                                    ->columnSpan(12),
                            ]),

                        // SEO Tab
                        Tabs\Tab::make('SEO')
                            ->icon(Heroicon::MagnifyingGlass)
                            ->columns(12)
                            ->schema([
                                TextInput::make('seo.meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(60)
                                    ->helperText('Optimal: 50-60 characters')
                                    ->columnSpan(12),

                                TextInput::make('seo.meta_keywords')
                                    ->label('Meta Keywords')
                                    ->helperText('Comma separated keywords')
                                    ->columnSpan(12),

                                Textarea::make('seo.meta_description')
                                    ->label('Meta Description')
                                    ->rows(2)
                                    ->maxLength(160)
                                    ->helperText('Optimal: 150-160 characters')
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

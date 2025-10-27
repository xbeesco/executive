<?php

namespace App\Filament\Pages;

use App\Models\Page as PageModel;
use App\Models\Setting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class SettingsPage extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?string $title = 'Site Settings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?int $navigationSort = 999;

    protected string $view = 'filament.pages.settings-page';

    public ?array $data = [];

    protected function getSchemas(): array
    {
        return [
            'form',
        ];
    }

    public function mount(): void
    {
        // Helper function to ensure array type for repeater fields
        $ensureArray = function ($value, $default = []) {
            if (is_string($value)) {
                // Old data was HTML string, convert to empty array for repeater
                return $default;
            }

            return is_array($value) ? $value : $default;
        };

        $this->data = [
            'general' => Setting::getValue('general', [
                'site_name' => 'Executive',
                'site_email' => 'info@executive.com',
                'site_phone' => '',
                'site_address' => '',
                'default_image' => '',
                'action_button_text' => '',
                'action_button_url' => '',
                'homepage_id' => '',
            ]),
            'branding' => Setting::getValue('branding', [
                'site_logo' => '',
                'site_logo_white' => '',
                'site_favicon' => '',
            ]),
            'social_links' => Setting::getValue('social_links', [
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ]),
            'menu' => $ensureArray(Setting::getValue('menu', []), []),
            'footer_menu_1' => $ensureArray(Setting::getValue('footer_menu_1', []), []),
            'footer_menu_2' => $ensureArray(Setting::getValue('footer_menu_2', []), []),
            'footer_bottom_menu' => $ensureArray(Setting::getValue('footer_bottom_menu', []), []),
            'working_hours' => $ensureArray(Setting::getValue('working_hours', []), []),
            'footer_copyright' => Setting::getValue('footer_copyright', 'Copyright © '.date('Y').' {{site_name}}, All Rights Reserved.'),
            'seo_defaults' => Setting::getValue('seo_defaults', [
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'og_image' => '',
            ]),
        ];

        $this->form->fill($this->data);
    }

    protected function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Tabs::make('Settings')
                    ->tabs([
                        Tabs\Tab::make('General Information')
                            ->label('General Information')
                            ->icon('heroicon-o-information-circle')
                            ->columns(12)
                            ->schema([
                                TextInput::make('general.site_name')
                                    ->label('Site Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('general.site_email')
                                    ->label('Contact Email Address')
                                    ->email()
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('general.site_phone')
                                    ->label('Phone Number')
                                    ->maxLength(20)
                                    ->columnSpan(6),

                                TextInput::make('general.site_address')
                                    ->label('Business Address')
                                    ->columnSpan(6),

                                Select::make('general.homepage_id')
                                    ->label('Homepage')
                                    ->options(function () {
                                        return PageModel::query()
                                            ->published()
                                            ->orderBy('title')
                                            ->pluck('title', 'id');
                                    })
                                    ->searchable()
                                    ->preload()
                                    ->nullable()
                                    ->columnSpan(6),

                                FileUpload::make('general.default_image')
                                    ->label('Default Placeholder Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images')
                                    ->imageEditor()
                                    ->columnSpan(6),
                            ]),

                        Tabs\Tab::make('Branding')
                            ->label('Branding')
                            ->icon('heroicon-o-photo')
                            ->columns(12)
                            ->schema([
                                FileUpload::make('branding.site_favicon')
                                    ->label('Site Favicon')
                                    ->downloadable()
                                    ->image()
                                    ->disk('public')
                                    ->directory('images')
                                    ->imageEditor()
                                    ->circleCropper()
                                    ->imagePreviewHeight('100')
                                    ->avatar()
                                    ->helperText('Browser tab icon')
                                    ->columnSpan(4),
                                FileUpload::make('branding.site_logo')
                                    ->label('Site Logo')
                                    ->downloadable()
                                    ->image()
                                    ->disk('public')
                                    ->directory('images')
                                    ->imageEditor()
                                    ->helperText('used in headers and footers')
                                    ->columnSpan(4),

                                FileUpload::make('branding.site_logo_white')
                                    ->label('Site Logo White')
                                    ->downloadable()
                                    ->image()
                                    ->disk('public')
                                    ->directory('images')
                                    ->imageEditor()
                                    ->helperText('White version of logo for dark backgrounds')
                                    ->columnSpan(4),

                            ]),

                        Tabs\Tab::make('Social Media Links')
                            ->label('Social Media Links')
                            ->icon('heroicon-o-share')
                            ->columns(12)
                            ->schema([
                                TextInput::make('social_links.facebook')
                                    ->label('Facebook Page URL')
                                    ->url()
                                    ->placeholder('https://facebook.com/yourpage')
                                    ->columnSpan(6),

                                TextInput::make('social_links.twitter')
                                    ->label('Twitter Profile URL')
                                    ->url()
                                    ->placeholder('https://twitter.com/yourhandle')
                                    ->columnSpan(6),

                                TextInput::make('social_links.instagram')
                                    ->label('Instagram Profile URL')
                                    ->url()
                                    ->placeholder('https://instagram.com/yourhandle')
                                    ->columnSpan(6),

                                TextInput::make('social_links.linkedin')
                                    ->label('LinkedIn Profile URL')
                                    ->url()
                                    ->placeholder('https://linkedin.com/company/yourcompany')
                                    ->columnSpan(6),
                            ]),

                        Tabs\Tab::make('Header Settings')
                            ->label('Header Settings')
                            ->icon('heroicon-o-bars-3')
                            ->columns(12)
                            ->schema([
                                Repeater::make('menu')
                                    ->label('Navigation Menu Items')
                                    ->columns(12)
                                    ->grid(2)
                                    ->schema([
                                        TextInput::make('label')
                                            ->label('Label')
                                            ->required()
                                            ->columnSpan(6),

                                        TextInput::make('url')
                                            ->label('Link')
                                            ->required()
                                            ->placeholder('/about-us')
                                            ->columnSpan(6),

                                        Repeater::make('children')
                                            ->label('Dropdown Sub-Items')
                                            ->disableLabel()
                                            ->columns(12)
                                            ->schema([
                                                TextInput::make('label')
                                                    ->label('Label')
                                                    ->required()
                                                    ->columnSpan(6),

                                                TextInput::make('url')
                                                    ->label('Link')
                                                    ->required()
                                                    ->columnSpan(6),
                                            ])
                                            ->collapsed()
                                            ->collapsible()
                                            ->cloneable()
                                           ->itemLabel(fn (array $state): ?string => $state['label'] ?? 'Sub Menu')
                                            ->addActionLabel('Add Dropdown Item')
                                            ->columnSpan(12),
                                    ])
                                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? 'Menu')
                                    ->collapsed()
                                    ->collapsible()
                                    ->cloneable()
                                    ->addActionLabel('Add Menu Item')
                                    ->reorderable()
                                    ->columnSpan(12),

                                TextInput::make('general.action_button_text')
                                    ->label('Action Button Text')
                                    ->maxLength(50)
                                    ->columnSpan(6),

                                TextInput::make('general.action_button_url')
                                    ->label('Action Button URL')
                                    ->maxLength(255)
                                    ->columnSpan(6),
                            ]),

                        Tabs\Tab::make('Footer Settings')
                            ->label('Footer Settings')
                            ->icon('heroicon-o-rectangle-group')
                            ->columns(12)
                            ->schema([

                                Repeater::make('footer_menu_1')
                                    ->label('Footer Menu 1')
                                    ->columns(12)
                                    ->schema([
                                        TextInput::make('label')
                                            ->label('Link Text')
                                            ->required()
                                            ->columnSpan(6),

                                        TextInput::make('url')
                                            ->label('URL')
                                            ->required()
                                            ->columnSpan(6),
                                    ])
                                    ->collapsed()
                                    ->collapsible()
                                    ->cloneable()
                                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? 'Menu')
                                    ->addActionLabel('Add Menu Item')
                                    ->columnSpan(6),

                                Repeater::make('footer_menu_2')
                                    ->label('Footer Menu 2')
                                    ->columns(12)
                                    ->schema([
                                        TextInput::make('label')
                                            ->label('Link Text')
                                            ->required()
                                            ->columnSpan(6),

                                        TextInput::make('url')
                                            ->label('URL')
                                            ->required()
                                            ->columnSpan(6),
                                    ])
                                    ->collapsed()
                                    ->collapsible()
                                    ->cloneable()
                                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? 'Menu')
                                    ->addActionLabel('Add Menu Item')
                                    ->helperText('used in footer styles 2 and 3')
                                    ->columnSpan(6),

                                Repeater::make('footer_bottom_menu')
                                    ->label('Footer Bottom Menu')
                                    ->columns(12)
                                    ->schema([
                                        TextInput::make('label')
                                            ->label('Link Text')
                                            ->required()
                                            ->columnSpan(6),

                                        TextInput::make('url')
                                            ->label('URL')
                                            ->required()
                                            ->columnSpan(6),
                                    ])
                                    ->collapsed()
                                    ->collapsible()
                                    ->cloneable()
                                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? 'Menu')
                                    ->addActionLabel('Add Menu Item')
                                    ->helperText('Used in footer style 8')
                                    ->columnSpan(6),

                                Repeater::make('working_hours')
                                    ->label('Working Hours')
                                    ->columns(12)
                                    ->schema([
                                        TextInput::make('day')
                                            ->label('Day/Period')
                                            ->required()
                                            ->placeholder('Monday - Friday')
                                            ->columnSpan(6),

                                        TextInput::make('hours')
                                            ->label('Hours')
                                            ->required()
                                            ->placeholder('9:00 AM - 6:00 PM')
                                            ->columnSpan(6),
                                    ])
                                    ->collapsed()
                                    ->collapsible()
                                    ->cloneable()
                                    ->itemLabel(fn (array $state): ?string => $state['day'] ?? 'New Entry')
                                    ->addActionLabel('Add Working Hours')
                                    ->helperText('Used in footer style 8')
                                    ->columnSpan(6),
                                Textarea::make('footer_copyright')
                                    ->label('Copyright Text')
                                    ->rows(2)
                                    ->helperText('Use {{site_name}} for dynamic site name.')
                                    ->columnSpan(12),

                            ]),

                        Tabs\Tab::make('SEO Defaults')
                            ->label('SEO Defaults')
                            ->icon('heroicon-o-magnifying-glass')
                            ->columns(12)
                            ->schema([
                                TextInput::make('seo_defaults.meta_title')
                                    ->label('Default Meta Title')
                                    ->maxLength(60)
                                    ->columnSpan(6),

                                TextInput::make('seo_defaults.meta_keywords')
                                    ->label('Default Meta Keywords')
                                    ->columnSpan(6),

                                Textarea::make('seo_defaults.meta_description')
                                    ->label('Default Meta Description')
                                    ->rows(2)
                                    ->maxLength(160)
                                    ->columnSpan(6),

                                FileUpload::make('seo_defaults.og_image')
                                    ->label('Default Social Media Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images')
                                    ->imageEditor()
                                    ->columnSpan(6),
                            ]),
                    ])
                    ->columnSpan('full'),
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save All Settings')
                ->color('primary')
                ->icon('heroicon-o-check-circle')
                ->action('saveSettings')
                ->requiresConfirmation()
                ->modalHeading('Confirm Settings Update')
                ->modalSubmitActionLabel('Yes, Save Settings')
                ->modalCancelActionLabel('Cancel'),
        ];
    }

    public function saveSettings(): void
    {
        try {
            $data = $this->form->getState();

            // Debug: Log data structure to file for inspection
            $logFile = storage_path('logs/settings-debug.json');
            file_put_contents($logFile, json_encode([
                'timestamp' => now()->toDateTimeString(),
                'data' => $data,
                'data_types' => array_map(function ($section) {
                    if (! is_array($section)) {
                        return gettype($section);
                    }

                    return array_map('gettype', $section);
                }, $data),
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            Setting::setValue('general', $data['general']);
            Setting::setValue('branding', $data['branding']);
            Setting::setValue('social_links', $data['social_links']);
            Setting::setValue('menu', $data['menu']);
            Setting::setValue('footer_menu_1', $data['footer_menu_1'] ?? []);
            Setting::setValue('footer_menu_2', $data['footer_menu_2'] ?? []);
            Setting::setValue('footer_bottom_menu', $data['footer_bottom_menu'] ?? []);
            Setting::setValue('working_hours', $data['working_hours'] ?? []);
            Setting::setValue('footer_copyright', $data['footer_copyright'] ?? '');
            Setting::setValue('seo_defaults', $data['seo_defaults']);

            Notification::make()
                ->title('Settings Updated Successfully!')
                ->success()
                ->duration(4000)
                ->send();
        } catch (\Exception $e) {
            // Log detailed error information
            \Log::error('Settings save failed', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            Notification::make()
                ->title('Settings Save Failed')
                ->body('Error: '.$e->getMessage())
                ->danger()
                ->duration(10000)
                ->send();
        }
    }
}

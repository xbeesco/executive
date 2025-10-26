<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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
        $this->data = [
            'general' => Setting::getValue('general', [
                'site_name' => 'Executive',
                'site_email' => 'info@executive.com',
                'site_phone' => '',
                'site_address' => '',
                'site_logo' => '',
                'site_logo_white' => '',
                'site_favicon' => '',
                'action_button_text' => '',
                'action_button_url' => '',
            ]),
            'social_links' => Setting::getValue('social_links', [
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ]),
            'menu' => Setting::getValue('menu', []),
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
                                    ->tel()
                                    ->maxLength(20)
                                    ->columnSpan(6),

                                TextInput::make('general.site_address')
                                    ->label('Business Address')
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                FileUpload::make('general.site_logo')
                                    ->label('Site Logo')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images')
                                    ->imageEditor()
                                    ->columnSpan(4),

                                FileUpload::make('general.site_logo_white')
                                    ->label('Site Logo White')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images')
                                    ->imageEditor()
                                    ->columnSpan(4),

                                FileUpload::make('general.site_favicon')
                                    ->label('Site Favicon')
                                    ->image()
                                    ->disk('public')
                                    ->directory('images')
                                    ->columnSpan(4),

                                TextInput::make('general.action_button_text')
                                    ->label('Action Button Text')
                                    ->maxLength(50)
                                    ->columnSpan(6),

                                TextInput::make('general.action_button_url')
                                    ->label('Action Button URL')
                                    ->maxLength(255)
                                    ->columnSpan(6),
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

                        Tabs\Tab::make('Navigation Menu')
                            ->label('Navigation Menu')
                            ->icon('heroicon-o-bars-3')
                            ->columns(12)
                            ->schema([
                                Repeater::make('menu')
                                    ->label('Menu Items')
                                    ->columns(12)
                                    ->schema([
                                        TextInput::make('label')
                                            ->label('Menu Label')
                                            ->required()
                                            ->columnSpan(6),

                                        TextInput::make('url')
                                            ->label('URL/Link')
                                            ->required()
                                            ->placeholder('/about-us')
                                            ->columnSpan(6),

                                        TextInput::make('icon')
                                            ->label('Menu Icon')
                                            ->placeholder('heroicon-o-home')
                                            ->columnSpan(6),

                                        Repeater::make('children')
                                            ->label('Dropdown Sub-Items')
                                            ->columns(12)
                                            ->schema([
                                                TextInput::make('label')
                                                    ->label('Sub-Item Label')
                                                    ->required()
                                                    ->columnSpan(6),

                                                TextInput::make('url')
                                                    ->label('Sub-Item URL')
                                                    ->required()
                                                    ->columnSpan(6),

                                                TextInput::make('icon')
                                                    ->label('Sub-Item Icon')
                                                    ->placeholder('heroicon-o-link')
                                                    ->columnSpan(6),
                                            ])
                                            ->collapsed()
                                            ->collapsible()
                                            ->addActionLabel('Add Dropdown Item')
                                            ->columnSpan(12),
                                    ])
                                    ->collapsed()
                                    ->collapsible()
                                    ->addActionLabel('Add Menu Item')
                                    ->reorderable()
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

            Setting::setValue('general', $data['general']);
            Setting::setValue('social_links', $data['social_links']);
            Setting::setValue('menu', $data['menu']);
            Setting::setValue('seo_defaults', $data['seo_defaults']);

            Notification::make()
                ->title('Settings Updated Successfully!')
                ->success()
                ->duration(4000)
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Settings Save Failed')
                ->danger()
                ->duration(6000)
                ->send();
        }
    }
}

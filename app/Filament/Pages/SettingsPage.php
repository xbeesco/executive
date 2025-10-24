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
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
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
                'site_favicon' => '',
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
                            ->schema([
                                Section::make('Basic Site Information')
                                    ->description('Configure your website\'s basic information and branding')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('general.site_name')
                                                    ->label('Site Name')
                                                    ->helperText('The name of your website')
                                                    ->required()
                                                    ->maxLength(255),

                                                TextInput::make('general.site_email')
                                                    ->label('Contact Email Address')
                                                    ->helperText('Primary contact email for your website')
                                                    ->email()
                                                    ->required(),

                                                TextInput::make('general.site_phone')
                                                    ->label('Phone Number')
                                                    ->helperText('Contact phone number (optional)')
                                                    ->tel()
                                                    ->maxLength(20),

                                                TextInput::make('general.site_address')
                                                    ->label('Business Address')
                                                    ->helperText('Physical address of your business (optional)')
                                                    ->maxLength(255),

                                                FileUpload::make('general.site_logo')
                                                    ->label('Site Logo')
                                                    ->helperText('Upload your website logo (recommended: PNG format)')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('images')
                                                    ->imageEditor(),

                                                FileUpload::make('general.site_favicon')
                                                    ->label('Site Favicon')
                                                    ->helperText('Small icon displayed in browser tabs (16x16 or 32x32 pixels)')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('images'),
                                            ]),
                                    ]),
                            ]),

                        Tabs\Tab::make('Social Media Links')
                            ->label('Social Media Links')
                            ->icon('heroicon-o-share')
                            ->schema([
                                Section::make('Social Media Profiles')
                                    ->description('Add links to your social media profiles')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('social_links.facebook')
                                                    ->label('Facebook Page URL')
                                                    ->helperText('Link to your Facebook business page')
                                                    ->url()
                                                    ->placeholder('https://facebook.com/yourpage'),

                                                TextInput::make('social_links.twitter')
                                                    ->label('Twitter Profile URL')
                                                    ->helperText('Link to your Twitter profile')
                                                    ->url()
                                                    ->placeholder('https://twitter.com/yourhandle'),

                                                TextInput::make('social_links.instagram')
                                                    ->label('Instagram Profile URL')
                                                    ->helperText('Link to your Instagram profile')
                                                    ->url()
                                                    ->placeholder('https://instagram.com/yourhandle'),

                                                TextInput::make('social_links.linkedin')
                                                    ->label('LinkedIn Profile URL')
                                                    ->helperText('Link to your LinkedIn company page')
                                                    ->url()
                                                    ->placeholder('https://linkedin.com/company/yourcompany'),
                                            ]),
                                    ]),
                            ]),

                        Tabs\Tab::make('Navigation Menu')
                            ->label('Navigation Menu')
                            ->icon('heroicon-o-bars-3')
                            ->schema([
                                Section::make('Website Navigation Menu')
                                    ->description('Configure your website\'s main navigation menu structure')
                                    ->schema([
                                        Repeater::make('menu')
                                            ->label('Menu Items')
                                            ->schema([
                                                TextInput::make('label')
                                                    ->label('Menu Label')
                                                    ->helperText('Text displayed in the menu')
                                                    ->required(),

                                                TextInput::make('url')
                                                    ->label('URL/Link')
                                                    ->helperText('Page URL or external link')
                                                    ->required()
                                                    ->placeholder('/about-us'),

                                                TextInput::make('icon')
                                                    ->label('Menu Icon')
                                                    ->placeholder('heroicon-o-home')
                                                    ->helperText('Optional: Use Heroicon class names'),

                                                Repeater::make('children')
                                                    ->label('Dropdown Sub-Items')
                                                    ->schema([
                                                        TextInput::make('label')
                                                            ->label('Sub-Item Label')
                                                            ->helperText('Text for dropdown item')
                                                            ->required(),

                                                        TextInput::make('url')
                                                            ->label('Sub-Item URL')
                                                            ->helperText('Link for this dropdown item')
                                                            ->required(),

                                                        TextInput::make('icon')
                                                            ->label('Sub-Item Icon')
                                                            ->placeholder('heroicon-o-link')
                                                            ->helperText('Optional icon for dropdown item'),
                                                    ])
                                                    ->collapsed()
                                                    ->collapsible()
                                                    ->addActionLabel('Add Dropdown Item'),
                                            ])
                                            ->collapsed()
                                            ->collapsible()
                                            ->addActionLabel('Add Menu Item')
                                            ->reorderable(),
                                    ]),
                            ]),

                        Tabs\Tab::make('SEO Defaults')
                            ->label('SEO Defaults')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Section::make('Default SEO Settings')
                                    ->description('Configure default SEO settings used when pages don\'t have specific SEO data')
                                    ->schema([
                                        TextInput::make('seo_defaults.meta_title')
                                            ->label('Default Meta Title')
                                            ->helperText('Default title used in search results (50-60 characters recommended)')
                                            ->maxLength(60),

                                        Textarea::make('seo_defaults.meta_description')
                                            ->label('Default Meta Description')
                                            ->helperText('Default description for search results (150-160 characters recommended)')
                                            ->rows(3)
                                            ->maxLength(160),

                                        TextInput::make('seo_defaults.meta_keywords')
                                            ->label('Default Meta Keywords')
                                            ->helperText('Comma-separated keywords relevant to your website'),

                                        FileUpload::make('seo_defaults.og_image')
                                            ->label('Default Social Media Image')
                                            ->helperText('Default image for social media sharing (1200x630 pixels recommended)')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images')
                                            ->imageEditor(),
                                    ]),
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
                ->modalDescription('Are you sure you want to save all these settings? This will update your website configuration.')
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
                ->body('All site settings have been saved and are now active on your website.')
                ->success()
                ->duration(4000)
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Settings Save Failed')
                ->body('Unable to save settings: '.$e->getMessage())
                ->danger()
                ->duration(6000)
                ->send();
        }
    }
}

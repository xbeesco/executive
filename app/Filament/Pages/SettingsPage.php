<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Dashboard;
use Filament\Support\Icons\Heroicon;

class SettingsPage extends Dashboard
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'الإعدادات';

    protected static ?string $title = 'إعدادات الموقع';

    protected static ?int $navigationSort = 999;

    public ?array $data = [];

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
            'socialLinks' => Setting::getValue('social_links', [
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ]),
            'menu' => Setting::getValue('menu', []),
            'seoDefaults' => Setting::getValue('seo_defaults', [
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => '',
                'og_image' => '',
            ]),
        ];

        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Settings')
                    ->tabs([
                        Tabs\Tab::make('المعلومات العامة')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('general.site_name')
                                                    ->label('اسم الموقع')
                                                    ->required()
                                                    ->maxLength(255),

                                                TextInput::make('general.site_email')
                                                    ->label('البريد الإلكتروني')
                                                    ->email()
                                                    ->required(),

                                                TextInput::make('general.site_phone')
                                                    ->label('رقم الهاتف')
                                                    ->tel()
                                                    ->maxLength(20),

                                                TextInput::make('general.site_address')
                                                    ->label('العنوان')
                                                    ->maxLength(255),

                                                FileUpload::make('general.site_logo')
                                                    ->label('شعار الموقع')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('images'),

                                                FileUpload::make('general.site_favicon')
                                                    ->label('أيقونة الموقع')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('images'),
                                            ]),
                                    ]),
                            ]),

                        Tabs\Tab::make('وسائل التواصل')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('socialLinks.facebook')
                                                    ->label('Facebook')
                                                    ->url()
                                                    ->placeholder('https://facebook.com/...'),

                                                TextInput::make('socialLinks.twitter')
                                                    ->label('Twitter')
                                                    ->url()
                                                    ->placeholder('https://twitter.com/...'),

                                                TextInput::make('socialLinks.instagram')
                                                    ->label('Instagram')
                                                    ->url()
                                                    ->placeholder('https://instagram.com/...'),

                                                TextInput::make('socialLinks.linkedin')
                                                    ->label('LinkedIn')
                                                    ->url()
                                                    ->placeholder('https://linkedin.com/...'),
                                            ]),
                                    ]),
                            ]),

                        Tabs\Tab::make('القائمة الرئيسية')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        Repeater::make('menu')
                                            ->label('')
                                            ->schema([
                                                TextInput::make('label')
                                                    ->label('التسمية')
                                                    ->required(),

                                                TextInput::make('url')
                                                    ->label('الرابط')
                                                    ->required()
                                                    ->placeholder('/about'),

                                                TextInput::make('icon')
                                                    ->label('الأيقونة')
                                                    ->placeholder('heroicon-o-home')
                                                    ->helperText('استخدم أسماء Heroicon'),

                                                Repeater::make('children')
                                                    ->label('العناصر الفرعية')
                                                    ->schema([
                                                        TextInput::make('label')
                                                            ->label('التسمية')
                                                            ->required(),

                                                        TextInput::make('url')
                                                            ->label('الرابط')
                                                            ->required(),

                                                        TextInput::make('icon')
                                                            ->label('الأيقونة')
                                                            ->placeholder('heroicon-o-link'),
                                                    ])
                                                    ->collapsed()
                                                    ->collapsible()
                                                    ->addActionLabel('إضافة عنصر فرعي'),
                                            ])
                                            ->collapsed()
                                            ->collapsible()
                                            ->addActionLabel('إضافة عنصر'),
                                    ]),
                            ]),

                        Tabs\Tab::make('إعدادات SEO الافتراضية')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('seoDefaults.meta_title')
                                            ->label('Meta Title الافتراضي')
                                            ->maxLength(60)
                                            ->helperText('يُستخدم عندما لا تحدد صفحة meta_title خاص بها'),

                                        Textarea::make('seoDefaults.meta_description')
                                            ->label('Meta Description الافتراضية')
                                            ->rows(3)
                                            ->maxLength(160),

                                        TextInput::make('seoDefaults.meta_keywords')
                                            ->label('Meta Keywords الافتراضية')
                                            ->helperText('كلمات مفتاحية مفصولة بفواصل'),

                                        FileUpload::make('seoDefaults.og_image')
                                            ->label('صورة OG الافتراضية')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images'),
                                    ]),
                            ]),
                    ])
                    ->columnSpan('full'),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Setting::setValue('general', $data['general']);
        Setting::setValue('social_links', $data['socialLinks']);
        Setting::setValue('menu', $data['menu']);
        Setting::setValue('seo_defaults', $data['seoDefaults']);

        $this->notification()
            ->success()
            ->title('تم حفظ الإعدادات بنجاح!')
            ->send();
    }
}

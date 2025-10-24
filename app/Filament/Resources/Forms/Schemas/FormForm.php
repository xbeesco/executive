<?php

namespace App\Filament\Resources\Forms\Schemas;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FormForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات أساسية')
                    ->description('المعلومات الأساسية للاستمارة')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('العنوان')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true),

                                TextInput::make('slug')
                                    ->label('الرابط (Slug)')
                                    ->required()
                                    ->unique('forms', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('يتم إنشاؤه تلقائياً من العنوان'),

                                Textarea::make('description')
                                    ->label('الوصف')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->helperText('وصف مختصر للاستمارة'),

                                Select::make('status')
                                    ->label('الحالة')
                                    ->options([
                                        'active' => 'نشطة',
                                        'inactive' => 'غير نشطة',
                                    ])
                                    ->required()
                                    ->default('active'),
                            ]),
                    ]),

                Section::make('حقول الاستمارة')
                    ->description('بناء حقول الاستمارة')
                    ->schema([
                        Builder::make('fields')
                            ->label('')
                            ->blocks([
                                Block::make('text')
                                    ->label('حقل نصي')
                                    ->icon('heroicon-o-pencil')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('اسم الحقل')
                                            ->required()
                                            ->helperText('مثال: full_name'),

                                        TextInput::make('label')
                                            ->label('التسمية')
                                            ->required(),

                                        TextInput::make('placeholder')
                                            ->label('النص التوضيحي'),

                                        Toggle::make('required')
                                            ->label('مطلوب')
                                            ->default(false),

                                        Select::make('width')
                                            ->label('العرض')
                                            ->options([
                                                'full' => 'كامل',
                                                'half' => 'نصف',
                                            ])
                                            ->default('full'),
                                    ]),

                                Block::make('email')
                                    ->label('بريد إلكتروني')
                                    ->icon('heroicon-o-envelope')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('اسم الحقل')
                                            ->required()
                                            ->default('email'),

                                        TextInput::make('label')
                                            ->label('التسمية')
                                            ->required(),

                                        TextInput::make('placeholder')
                                            ->label('النص التوضيحي'),

                                        Toggle::make('required')
                                            ->label('مطلوب')
                                            ->default(true),

                                        Select::make('width')
                                            ->label('العرض')
                                            ->options([
                                                'full' => 'كامل',
                                                'half' => 'نصف',
                                            ])
                                            ->default('full'),
                                    ]),

                                Block::make('textarea')
                                    ->label('نص طويل')
                                    ->icon('heroicon-o-bars-3-bottom-left')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('اسم الحقل')
                                            ->required(),

                                        TextInput::make('label')
                                            ->label('التسمية')
                                            ->required(),

                                        TextInput::make('placeholder')
                                            ->label('النص التوضيحي'),

                                        Toggle::make('required')
                                            ->label('مطلوب')
                                            ->default(false),
                                    ]),

                                Block::make('number')
                                    ->label('رقم')
                                    ->icon('heroicon-o-hashtag')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('اسم الحقل')
                                            ->required(),

                                        TextInput::make('label')
                                            ->label('التسمية')
                                            ->required(),

                                        TextInput::make('placeholder')
                                            ->label('النص التوضيحي'),

                                        Toggle::make('required')
                                            ->label('مطلوب')
                                            ->default(false),

                                        Select::make('width')
                                            ->label('العرض')
                                            ->options([
                                                'full' => 'كامل',
                                                'half' => 'نصف',
                                            ])
                                            ->default('half'),
                                    ]),

                                Block::make('select')
                                    ->label('قائمة منسدلة')
                                    ->icon('heroicon-o-list-bullet')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('اسم الحقل')
                                            ->required(),

                                        TextInput::make('label')
                                            ->label('التسمية')
                                            ->required(),

                                        Textarea::make('options')
                                            ->label('الخيارات')
                                            ->required()
                                            ->helperText('خيار واحد في كل سطر'),

                                        Toggle::make('required')
                                            ->label('مطلوب')
                                            ->default(false),

                                        Select::make('width')
                                            ->label('العرض')
                                            ->options([
                                                'full' => 'كامل',
                                                'half' => 'نصف',
                                            ])
                                            ->default('full'),
                                    ]),
                            ])
                            ->columnSpanFull()
                            ->addActionLabel('إضافة حقل'),
                    ]),

                Section::make('إعدادات الاستمارة')
                    ->description('إعدادات الإرسال والبريد الإلكتروني')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('settings.submit_button_text')
                                    ->label('نص زر الإرسال')
                                    ->default('إرسال'),

                                TextInput::make('settings.success_message')
                                    ->label('رسالة النجاح')
                                    ->default('تم إرسال الاستمارة بنجاح'),

                                TextInput::make('settings.redirect_url')
                                    ->label('رابط التحويل')
                                    ->helperText('اختياري: رابط التحويل بعد الإرسال'),

                                TextInput::make('settings.email_to')
                                    ->label('إرسال إلى البريد الإلكتروني')
                                    ->email()
                                    ->helperText('اختياري: إرسال نسخة من الاستمارة'),
                            ]),
                    ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات المستخدم')
                    ->description('المعلومات الأساسية للمستخدم')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('الاسم')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->label('البريد الإلكتروني')
                                    ->email()
                                    ->required()
                                    ->unique('users', 'email', ignoreRecord: true)
                                    ->maxLength(255),

                                TextInput::make('password')
                                    ->label('كلمة المرور')
                                    ->password()
                                    ->required(fn($context) => $context === 'create')
                                    ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                                    ->dehydrated(fn($state) => filled($state))
                                    ->helperText('اتركه فارغاً إذا كنت لا تريد تغييره')
                                    ->minLength(8)
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}

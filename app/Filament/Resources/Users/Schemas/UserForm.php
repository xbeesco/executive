<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 8 Columns
                Section::make('User Information')
                    ->description('Basic user account information')
                    ->schema([
                        Fieldset::make('Account Details')
                            ->columns(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(2),

                                TextInput::make('email')
                                    ->label('Email Address')
                                    ->email()
                                    ->required()
                                    ->unique('users', 'email', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->columnSpan(2),

                                TextInput::make('password')
                                    ->label('Password')
                                    ->password()
                                    ->required(fn ($context) => $context === 'create')
                                    ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                                    ->dehydrated(fn ($state) => filled($state))
                                    ->helperText('Leave blank if you do not want to change it')
                                    ->minLength(8)
                                    ->columnSpan(2),
                            ]),
                    ])
                    ->columnSpan(8),

                // Sidebar Section - 4 Columns
                Section::make('User Settings')
                    ->schema([
                        Fieldset::make('Additional Information')
                            ->schema([
                                // Placeholder for future user settings
                            ]),
                    ])
                    ->columnSpan(4),
            ]);
    }
}

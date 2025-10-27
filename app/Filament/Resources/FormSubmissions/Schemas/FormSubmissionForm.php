<?php

namespace App\Filament\Resources\FormSubmissions\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FormSubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 8 Columns
                Section::make('Submitted Data')
                    ->description('Data submitted from the form')
                    ->schema([
                        KeyValue::make('data')
                            ->label('')
                            ->disabled(),
                    ])
                    ->columnSpan(8),

                // Sidebar Section - 4 Columns
                Section::make('Submission Details')
                    ->schema([
                        // Form Information
                        Fieldset::make('Form Information')
                            ->schema([
                                Select::make('form_id')
                                    ->label('Form')
                                    ->relationship('form', 'title')
                                    ->disabled()
                                    ->required(),

                                Toggle::make('read')
                                    ->label('Mark as Read')
                                    ->default(false),
                            ]),

                        // Technical Details
                        Fieldset::make('Technical Details')
                            ->schema([
                                TextInput::make('ip_address')
                                    ->label('IP Address')
                                    ->disabled(),

                                TextInput::make('user_agent')
                                    ->label('User Agent')
                                    ->disabled(),
                            ]),
                    ])
                    ->columnSpan(4),
            ]);
    }
}

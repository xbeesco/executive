<?php

namespace App\Filament\Resources\FormSubmissions\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class FormSubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 7 Columns
                Section::make('Submitted Data')
                    ->description('Data submitted from the form')
                    ->schema([
                        KeyValue::make('data')
                            ->label('')
                            ->disabled(),
                    ])
                    ->columnSpan(7),

                // Sidebar - 5 Columns with Tabs
                Tabs::make('Settings')
                    ->columnSpan(5)
                    ->columns(12)
                    ->tabs([
                        // Form Information Tab
                        Tabs\Tab::make('Form Information')
                            ->icon(Heroicon::DocumentText)
                            ->columns(12)
                            ->schema([
                                Select::make('form_id')
                                    ->label('Form')
                                    ->relationship('form', 'title')
                                    ->disabled()
                                    ->required()
                                    ->columnSpan(12),

                                Toggle::make('read')
                                    ->label('Mark as Read')
                                    ->default(false)
                                    ->columnSpan(12),
                            ]),

                        // Technical Details Tab
                        Tabs\Tab::make('Technical Details')
                            ->icon(Heroicon::Cog6Tooth)
                            ->columns(12)
                            ->schema([
                                TextInput::make('ip_address')
                                    ->label('IP Address')
                                    ->disabled()
                                    ->columnSpan(6),

                                TextInput::make('user_agent')
                                    ->label('User Agent')
                                    ->disabled()
                                    ->columnSpan(12),
                            ]),
                    ]),
            ]);
    }
}

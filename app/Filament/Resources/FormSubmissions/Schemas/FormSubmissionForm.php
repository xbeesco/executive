<?php

namespace App\Filament\Resources\FormSubmissions\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FormSubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات الرد')
                    ->description('معلومات الرد على الاستمارة')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('form_id')
                                    ->label('الاستمارة')
                                    ->relationship('form', 'title')
                                    ->disabled()
                                    ->required(),

                                Toggle::make('read')
                                    ->label('تم القراءة')
                                    ->default(false),

                                TextInput::make('ip_address')
                                    ->label('عنوان IP')
                                    ->disabled(),

                                TextInput::make('user_agent')
                                    ->label('User Agent')
                                    ->disabled()
                                    ->columnSpanFull(),
                            ]),
                    ]),

                Section::make('البيانات المرسلة')
                    ->description('البيانات التي تم إرسالها من الاستمارة')
                    ->schema([
                        KeyValue::make('data')
                            ->label('')
                            ->disabled()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

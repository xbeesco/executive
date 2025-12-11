<?php

namespace App\Filament\Resources\Forms\Schemas;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Support\Icons\Heroicon;

class FormForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 7 Columns
                Section::make('Form Fields')
                    ->schema([
                        Builder::make('fields')
                            ->label('')
                            ->blocks([
                                Block::make('text')
                                    ->label('Text Field')
                                    ->icon('heroicon-o-pencil')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Field Name')
                                            ->required()
                                            ->helperText('Example: full_name'),

                                        TextInput::make('label')
                                            ->label('Label')
                                            ->required(),

                                        TextInput::make('placeholder')
                                            ->label('Placeholder'),

                                        Toggle::make('required')
                                            ->label('Required')
                                            ->default(false),

                                        Select::make('width')
                                            ->label('Width')
                                            ->options([
                                                'full' => 'Full',
                                                'half' => 'Half',
                                            ])
                                            ->default('full'),
                                    ]),

                                Block::make('email')
                                    ->label('Email Field')
                                    ->icon('heroicon-o-envelope')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Field Name')
                                            ->required()
                                            ->default('email'),

                                        TextInput::make('label')
                                            ->label('Label')
                                            ->required(),

                                        TextInput::make('placeholder')
                                            ->label('Placeholder'),

                                        Toggle::make('required')
                                            ->label('Required')
                                            ->default(true),

                                        Select::make('width')
                                            ->label('Width')
                                            ->options([
                                                'full' => 'Full',
                                                'half' => 'Half',
                                            ])
                                            ->default('full'),
                                    ]),

                                Block::make('textarea')
                                    ->label('Textarea Field')
                                    ->icon('heroicon-o-bars-3-bottom-left')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Field Name')
                                            ->required(),

                                        TextInput::make('label')
                                            ->label('Label')
                                            ->required(),

                                        TextInput::make('placeholder')
                                            ->label('Placeholder'),

                                        Toggle::make('required')
                                            ->label('Required')
                                            ->default(false),
                                    ]),

                                Block::make('number')
                                    ->label('Number Field')
                                    ->icon('heroicon-o-hashtag')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Field Name')
                                            ->required(),

                                        TextInput::make('label')
                                            ->label('Label')
                                            ->required(),

                                        TextInput::make('placeholder')
                                            ->label('Placeholder'),

                                        Toggle::make('required')
                                            ->label('Required')
                                            ->default(false),

                                        Select::make('width')
                                            ->label('Width')
                                            ->options([
                                                'full' => 'Full',
                                                'half' => 'Half',
                                            ])
                                            ->default('half'),
                                    ]),

                                Block::make('select')
                                    ->label('Select Dropdown')
                                    ->icon('heroicon-o-list-bullet')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Field Name')
                                            ->required(),

                                        TextInput::make('label')
                                            ->label('Label')
                                            ->required(),

                                        Textarea::make('options')
                                            ->label('Options')
                                            ->required()
                                            ->helperText('One option per line'),

                                        Toggle::make('required')
                                            ->label('Required')
                                            ->default(false),

                                        Select::make('width')
                                            ->label('Width')
                                            ->options([
                                                'full' => 'Full',
                                                'half' => 'Half',
                                            ])
                                            ->default('full'),
                                    ]),
                            ])
                            ->collapsible()
                            ->addActionLabel('Add Field'),
                    ])
                    ->columnSpan(7),

                // Sidebar - 5 Columns with Tabs
                Tabs::make('Settings')
                    ->columnSpan(5)
                    ->columns(12)
                    ->tabs([
                        // General Tab
                        Tabs\Tab::make('General')
                            ->icon(Heroicon::Cog6Tooth)
                            ->columns(12)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                        if (($get("slug") ?? "") !== Str::slug($old)) {
                                            return;
                                        }
                                        $set("slug", Str::slug($state));
                                    })
                                    ->columnSpan(6),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->unique('forms', 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->helperText('Auto-generated from title')
                                    ->columnSpan(6),

                                Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'active' => 'Active',
                                        'inactive' => 'Inactive',
                                    ])
                                    ->required()
                                    ->default('active')
                                    ->columnSpan(12),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(3)
                                    ->helperText('Brief form description')
                                    ->columnSpan(12),
                            ]),

                        // Configuration Tab
                        Tabs\Tab::make('Configuration')
                            ->icon(Heroicon::AdjustmentsHorizontal)
                            ->columns(12)
                            ->schema([
                                TextInput::make('settings.submit_button_text')
                                    ->label('Submit Button Text')
                                    ->default('Submit')
                                    ->columnSpan(6),

                                TextInput::make('settings.email_to')
                                    ->label('Send Email To')
                                    ->email()
                                    ->helperText('Optional: send form copy via email')
                                    ->columnSpan(6),

                                TextInput::make('settings.success_message')
                                    ->label('Success Message')
                                    ->default('Form submitted successfully')
                                    ->columnSpan(12),

                                TextInput::make('settings.redirect_url')
                                    ->label('Redirect URL')
                                    ->helperText('Optional: redirect after submission')
                                    ->columnSpan(12),
                            ]),
                    ]),
            ]);
    }
}

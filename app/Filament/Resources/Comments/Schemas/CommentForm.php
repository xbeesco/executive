<?php

namespace App\Filament\Resources\Comments\Schemas;

use App\Enums\CommentStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(12)
            ->components([
                // Main Content Section - 8 Columns
                Section::make('Comment Content')
                    ->description('The comment text and content')
                    ->schema([
                        Fieldset::make('Comment')
                            ->schema([
                                Textarea::make('content')
                                    ->label('Comment')
                                    ->required()
                                    ->rows(5),
                            ]),
                    ])
                    ->columnSpan(8),

                // Sidebar Section - 4 Columns
                Section::make('Comment Settings')
                    ->schema([
                        // Author Information
                        Fieldset::make('Author Information')
                            ->columns(2)
                            ->schema([
                                TextInput::make('author_name')
                                    ->label('Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(2),

                                TextInput::make('author_email')
                                    ->label('Email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('author_website')
                                    ->label('Website')
                                    ->url()
                                    ->maxLength(255),
                            ]),

                        // Status & Associations
                        Fieldset::make('Status & Associations')
                            ->schema([
                                Select::make('status')
                                    ->label('Status')
                                    ->options(CommentStatus::class)
                                    ->required()
                                    ->default(CommentStatus::PENDING->value),

                                Select::make('post_id')
                                    ->label('Post')
                                    ->relationship('post', 'title')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Select::make('parent_id')
                                    ->label('Reply to Comment')
                                    ->relationship('parent', 'author_name')
                                    ->searchable()
                                    ->preload()
                                    ->helperText('Select a comment if this is a reply'),
                            ]),
                    ])
                    ->columnSpan(4),
            ]);
    }
}

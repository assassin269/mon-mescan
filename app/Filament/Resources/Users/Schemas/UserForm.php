<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nom complet')
                    ->maxLength(255)
                    ->required(),

                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

               select::make('role')
                    ->label('Rôle')
                    ->options([
        'admin' => 'Employé (Admin)',
        'directeur' => 'Directeur',
    ])
                    ->required()
                    ->default('admin'),

                TextInput::make('password')
                    ->label('Mot de passe')
                 ->password()
                 ->dehydrated(fn ($state) => filled($state))
                  ->required(fn (string $operation): bool => $operation === 'create')
                  ->maxLength(255),
            ]);
    }
}

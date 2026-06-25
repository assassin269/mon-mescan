<?php

namespace App\Filament\Resources\Permis\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Str;
use App\Models\Categories;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Utilities\Get;

class PermisForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('uuid')
                    ->default((string) Str::uuid()),

                Hidden::make('user_id')
                    ->default(auth()->id()),

                Section::make('Info du conducteur')
                    ->schema([
                        TextInput::make('nom')
                            ->required(),
                        TextInput::make('prenom')
                            ->required(),
                        DatePicker::make('date_de_naissance')
                            ->required(),
                        TextInput::make('lieu_de_naissance')
                            ->required(),
                        TextInput::make('domicile')
                            ->required(),
                        FileUpload::make('photo_du_conducteur')
                            ->directory('photo_conducteur')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->required(),
                    ])->columns(2),

                Section::make('information du permis')
                    ->schema([
                        TextInput::make('numero_du_permis')
                            ->required(),
                        TextInput::make('serie')
                            ->required(),
                        TextInput::make('centre_d_emission')
                            ->label('Lieu de délivrance (Centre)')
                            ->required(),
                        DatePicker::make('date_d_emission')
                            ->default(now())
                            ->required(),
                        TextInput::make('nom_du_directeur_general')
                            ->label('Nom du Directeur Général')
                            ->required(),
                    ])->columns(2),

                Section::make('Catégories et Validité du Permis')
                    ->schema([
                        Repeater::make('categorie')
                            ->label('Catégories de ce permis')
                            ->schema([
                                Select::make('categorie_id')
                                    ->label('Choix de la catégorie')
                                    ->options(Categories::all()->pluck('label', 'code'))
                                    ->required(),
                                Select::make('statut')
                                    ->options([
                                        'Permanent' => 'Permanent',
                                        'Temporaire' => 'Temporaire',
                                    ])
                                    ->required()
                                    ->live(),
                                DatePicker::make('date_d_expiration')
                                    ->label("Date d'expiration")
                                    ->visible(fn (Get $get) => $get('statut') === 'Temporaire')
                                    ->required(fn (Get $get) => $get('statut') === 'Temporaire'),
                            ])
                            ->columns(2)
                            ->addActionLabel('Ajouter une catégorie'),
                    ]),

                Section::make('Mentions specifiques')
                    ->schema([
                        Textarea::make('conditions_restrictives_d_usage')
                            ->label('5. Conditions restrictives d\'usage')
                            ->columnSpanFull(),
                        Textarea::make('mentions_additionnelles')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

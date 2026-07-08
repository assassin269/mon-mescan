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
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\DirecteurGeneral;
use App\Models\User;
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
                    ->default(Auth::id()),

                Hidden::make('nom_du_directeur_general')
                    ->default(function () {
                        /** @var User|null $user */
                        $user = Auth::user();

                        // Si l'utilisateur est un agent, chercher son directeur
                        if ($user->isAgent() && $user->directeur_general_id) {
                            $directeur = DirecteurGeneral::find($user->directeur_general_id);
                            return $directeur?->nom ?? 'NON DEFINI';
                        }

                        // Si l'utilisateur est un directeur, prendre son nom
                        if ($user->isDirecteur() && $user->directeur_general_id) {
                            $directeur = DirecteurGeneral::find($user->directeur_general_id);
                            return $directeur?->nom ?? $user->name;
                        }

                        return 'NON DEFINI';
                    }),

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

                Section::make('Information du permis')
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
                            ->disabled()
                            ->dehydrated(),
                    ])->columns(2),

                Section::make('Catégories et Validité du Permis')
                    ->schema([
                        Repeater::make('categorie')
                            ->label('Catégories de ce permis')
                            ->schema([
                                Select::make('categorie_id')
                                    ->label('Choix de la catégorie')
                                    ->options(Categories::all()->pluck('label', 'code'))
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        if (in_array($state, ['C', 'D', 'E'])) {
                                            $set('statut', 'Temporaire');
                                        }
                                    }),

                                Select::make('statut')
                                    ->options([
                                        'Permanent' => 'Permanent',
                                        'Temporaire' => 'Temporaire',
                                    ])
                                    ->required()
                                    ->live()
                                    ->default(function (Get $get) {
                                        $categorieId = $get('categorie_id');
                                        if (in_array($categorieId, ['C', 'D', 'E'])) {
                                            return 'Temporaire';
                                        }
                                        return 'Permanent';
                                    })
                                    ->disabled(function (Get $get) {
                                        $categorieId = $get('categorie_id');
                                        return in_array($categorieId, ['C', 'D', 'E']);
                                    })
                                    ->hint(function (Get $get) {
                                        $categorieId = $get('categorie_id');
                                        if (in_array($categorieId, ['C', 'D', 'E'])) {
                                            return '⛔ Cette catégorie est obligatoirement temporaire';
                                        }
                                        return null;
                                    }),

                                DatePicker::make('date_d_expiration')
                                    ->label("Date d'expiration")
                                    ->visible(fn (Get $get) => $get('statut') === 'Temporaire')
                                    ->required(fn (Get $get) => $get('statut') === 'Temporaire'),
                            ])
                            ->columns(2)
                            ->addActionLabel('Ajouter une catégorie'),
                    ]),

                Section::make('Mentions spécifiques')
                    ->schema([
                        Textarea::make('conditions_restrictives_d_usage')
                            ->label('Conditions restrictives d\'usage')
                            ->columnSpanFull(),
                        Textarea::make('mentions_additionnelles')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

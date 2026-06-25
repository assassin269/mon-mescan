<?php

namespace App\Filament\Resources\Permis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction; // Utilisé pour le bouton d'édition
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PermisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('uuid')
                    ->label('UUID')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('nom')
                    ->searchable(),
                TextColumn::make('prenom')
                    ->searchable(),
                TextColumn::make('date_de_naissance')
                    ->date()
                    ->sortable(),
                TextColumn::make('lieu_de_naissance')
                    ->searchable(),
                TextColumn::make('domicile')
                    ->searchable(),
                TextColumn::make('photo_du_conducteur')
                    ->searchable(),
                TextColumn::make('numero_du_permis')
                    ->searchable(),
                TextColumn::make('serie')
                    ->searchable(),
                TextColumn::make('centre_d_emission')
                    ->searchable(),
                TextColumn::make('date_d_emission')
                    ->date()
                    ->sortable(),
                TextColumn::make('nom_du_directeur_general')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            // 1. Cette action définit ce qui se passe quand on clique sur la ligne (on garde la modification)
            ->recordActions([
                EditAction::make(),
            ])
            // 2. C'est ICI qu'on génère la vraie colonne de boutons indépendants en bout de ligne !
            ->actions([
                // Le bouton Modifier
                EditAction::make(),

            // 2. Le bouton PDF avec la couleur 'info' (Bleu vif professionnel)
                \Filament\Actions\Action::make('telecharger_pdf')
                    ->label('PDF')
                    ->color('info') // Utilisation de 'info' (bleu vif reconnu par Filament)
                    ->icon('heroicon-m-arrow-down-tray') // Icône moderne de téléchargement
                    ->requiresConfirmation()

                    // --- DESIGN DE LA BOÎTE D'ALERTE (MODAL) ---
                    ->modalHeading('Téléchargement du Document')
                    ->modalDescription('Voulez-vous vraiment générer et télécharger le PDF de ce permis ?')
                    ->modalIcon('heroicon-o-arrow-down-tray') // Rappel de l'icône en haut de la boîte
                    ->modalIconColor('info') // L'icône de la boîte s'allume en bleu vif
                    ->modalSubmitActionLabel('télécharger')
                    ->modalSubmitAction(fn ($action) => $action->color('info')) // Le bouton de validation devient bleu vif
                    ->modalCancelActionLabel('Annuler')

                    // L'action de redirection
                    ->action(fn ($record) => redirect()->to(route('permis.pdf', ['uuid' => $record->uuid]))),

                // Le bouton de Suppression unitaire sécurisé
                \Filament\Actions\DeleteAction::make()
                    ->requiresConfirmation(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

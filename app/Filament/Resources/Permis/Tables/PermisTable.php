<?php

namespace App\Filament\Resources\Permis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;        // Pour DeleteAction::make()
use Filament\Actions\EditAction;          // Pour EditAction::make()
use Filament\Actions\Action;
use Filament\Support\Enums\Width;
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
            ->recordActions([
                EditAction::make(),
            ])
            ->actions([
                // ============================================================
                // 1. BOUTON "VOIR" (Œil) - Slide-Over avec aperçu recto + verso
                // ============================================================
                Action::make('voir')
                    ->label('Voir')
                    ->color('success')
                    ->icon('heroicon-m-eye')
                    ->modalHeading('Aperçu du Permis')
                    ->modalContent(function ($record) {
                        return view('permis.partials.preview', ['permis' => $record]);
                    })
                    ->modalWidth(Width::SevenExtraLarge)
                    ->slideOver(),

                // ============================================================
                // 2. BOUTON "MODIFIER" (Edit)
                // ============================================================
                EditAction::make()
                    ->color('warning'),

                // ============================================================
                // 3. BOUTON "PDF" (Télécharger)
                // ============================================================
                Action::make('telecharger_pdf')
                    ->label('PDF')
                    ->color('info')
                    ->icon('heroicon-m-arrow-down-tray')
                    ->requiresConfirmation()
                    ->modalHeading('Téléchargement du Document')
                    ->modalDescription('Voulez-vous vraiment générer et télécharger le PDF de ce permis ?')
                    ->modalIcon('heroicon-o-arrow-down-tray')
                    ->modalIconColor('info')
                    ->modalSubmitActionLabel('Télécharger')
                    ->modalSubmitAction(fn ($action) => $action->color('info'))
                    ->modalCancelActionLabel('Annuler')
                    ->action(fn ($record) => redirect()->to(route('permis.pdf', ['uuid' => $record->uuid]))),

                // ============================================================
                // 4. BOUTON "SUPPRIMER" (Delete)
                // ============================================================
                DeleteAction::make()
                    ->color('danger')
                    ->requiresConfirmation(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

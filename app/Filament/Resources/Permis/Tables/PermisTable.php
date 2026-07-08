<?php

namespace App\Filament\Resources\Permis\Tables;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Support\Enums\Width;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

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
                    ->label('Créé par')
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
            // ============================================================
            // FILTRE PAR RÔLE
            // ============================================================
            ->modifyQueryUsing(function (Builder $query) {
                /** @var User|null $user */
                $user = Auth::user();

                if (!$user) {
                    return $query;
                }

                // Admin voit tout
                if ($user->isAdmin()) {
                    return $query;
                }

                // Directeur voit les permis de ses employés + les siens
                if ($user->isDirecteur()) {
                    $employesIds = User::where('directeur_general_id', $user->directeur_general_id)
                                       ->where('id', '!=', $user->id)
                                       ->pluck('id')
                                       ->toArray();
                    $employesIds[] = $user->id;

                    return $query->whereIn('user_id', $employesIds);
                }

                // Agent ne voit que ses propres permis
                if ($user->isAgent()) {
                    return $query->where('user_id', $user->id);
                }

                return $query;
            })
            ->recordActions([
                EditAction::make(),
            ])
            ->actions([
                // ============================================================
                // BOUTON "VOIR"
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
                // BOUTON "MODIFIER"
                // ============================================================
                EditAction::make()
                    ->color('warning')
                    ->visible(function ($record) {
                        /** @var User|null $user */
                        $user = Auth::user();
                        if (!$user) return false;

                        // Admin peut tout modifier
                        if ($user->isAdmin()) {
                            return true;
                        }

                        // Directeur peut modifier ses propres permis + ceux de ses agents
                        if ($user->isDirecteur()) {
                            $employesIds = User::where('directeur_general_id', $user->directeur_general_id)
                                               ->where('id', '!=', $user->id)
                                               ->pluck('id')
                                               ->toArray();
                            $employesIds[] = $user->id; // ← AJOUT DU DIRECTEUR LUI-MÊME
                            return in_array($record->user_id, $employesIds);
                        }

                        // Agent peut modifier ses propres permis
                        if ($user->isAgent()) {
                            return $user->id === $record->user_id;
                        }

                        return false;
                    }),

                // ============================================================
                // BOUTON "PDF"
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
                // BOUTON "SUPPRIMER"
                // ============================================================
                \Filament\Actions\DeleteAction::make()
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(function ($record) {
                        /** @var User|null $user */
                        $user = Auth::user();
                        if (!$user) return false;

                        // Admin peut tout supprimer
                        if ($user->isAdmin()) {
                            return true;
                        }

                        // Directeur peut supprimer ses propres permis + ceux de ses agents
                        if ($user->isDirecteur()) {
                            $employesIds = User::where('directeur_general_id', $user->directeur_general_id)
                                               ->where('id', '!=', $user->id)
                                               ->pluck('id')
                                               ->toArray();
                            $employesIds[] = $user->id; // ← AJOUT DU DIRECTEUR LUI-MÊME
                            return in_array($record->user_id, $employesIds);
                        }

                        // Agent ne peut PAS supprimer
                        return false;
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

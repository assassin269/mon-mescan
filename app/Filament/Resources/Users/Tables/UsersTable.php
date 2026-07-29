<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')

                ->label('Nom complet')
                ->searchable()
                ->sortable(),

                TextColumn::make('email')
                    ->label('Adresse email')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('role')
                    ->badge()
                   ->color(fn (string $state): string => match ($state) {
                   'directeur' => 'info',
                  'admin' => 'success',
                 default => 'gray',
                 })
                 ->formatStateUsing(fn (string $state): string => match ($state) {
                 'directeur' => 'Directeur',
                 'admin' => 'Employé (Admin)',
                  default => $state,
                })
                    ->searchable(),

               TextColumn::make('email_verified_at')
                  ->label('Email vérifié le')
                  ->dateTime('d/m/Y H:i')
                  ->sortable()
                  ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Modifié le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

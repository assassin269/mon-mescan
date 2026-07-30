<?php

namespace App\Filament\Resources\PermisLogs;

use App\Filament\Resources\PermisLogs\Pages\ManagePermisLogs;
use App\Models\PermisLog;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
class PermisLogResource extends Resource
{
    protected static ?string $model = PermisLog::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clock';

    protected static ?string $recordTitleAttribute = 'Historique';
    protected static ?string $navigationLabel = 'Historique';
    protected static ?string $pluralModelLabel = 'Historique des permis';

    public static function canViewAny(): bool
    {
        $user = Auth::user();

        return $user?->isDirecteur() ?? false;
    }
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Historique')
            ->columns([
                TextColumn::make('created_at')
                    ->label('Créer le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('permis.numero_du_permis')
                    ->label('N°')
                    ->formatStateUsing(function (PermisLog $record) {
        // 1. Si le permis existe (même s'il est en corbeille grâce à withTrashed)
        if ($record->permis) {
            return $record->permis->numero_du_permis; // Ex: "P-2026-004"
        }

        // 2. Si le permis a été supprimé définitivement
        return $record->numero_du_permis_sauvegarde ?? 'N° Inconnu';
    }),
                TextColumn::make('user.name')
                    ->label('Utilisateur')
                    ->searchable(),
                TextColumn::make('action')
                    ->Label('Evenement')
                    ->badge()
                    ->color(fn ($state): string => match ($state) {
                        'ajouter' => 'success',
                        'modifier' => 'warning',
                        'supprimer' => 'danger',
                        'suppression definitive'=>'gray',
                        'Restaurer'=>'info',
                    }),
                TextColumn::make('motif')
                    ->label('Motif')

                    ->limit(300),])
                    ->defaultSort('created_at', 'desc')
                    ->filters([
                        SelectFilter::make('action')
                            ->label('Filtrer par action')
                            ->options([
                                'ajouter' => 'Permis Ajoutés',
                                'modifier' => 'Permis Modifiés',
                                'supprimer' => 'Permis Supprimés',
                            ]),
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

    public static function getPages(): array
    {
        return [
            'index' => ManagePermisLogs::route('/'),
        ];
    }
}

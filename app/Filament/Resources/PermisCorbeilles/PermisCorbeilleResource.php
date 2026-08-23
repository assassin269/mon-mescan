<?php

namespace App\Filament\Resources\PermisCorbeilles;

use App\Filament\Resources\Permis\Tables\PermisTable;
use App\Filament\Resources\PermisCorbeilles\Pages\ManagePermisCorbeilles;
use App\Models\Permis;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\RestoreAction;
use Filament\Actions\ForceDeleteAction;
use Illuminate\Support\Facades\Auth;

class PermisCorbeilleResource extends Resource
{
    protected static ?string $model = Permis::class;

    protected static ?string $navigationLabel = 'Corbeille';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTrash;

    // Facultatif : tu peux enlever cette ligne si l'ordre dans le menu n'a pas d'importance pour toi
    protected static ?int $navigationSort = 3;

    /**
     * Charge UNIQUEMENT les permis qui ont été supprimés (deleted_at != null)
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->onlyTrashed();
    }

    /**
     * Réutilise la structure de tableau de tes Permis
     */
    public static function table(Table $table): Table
    {
        $table = PermisTable::configure($table);
        return $table->actions([
        RestoreAction::make()
                ->label('Restaurer')
                ->color('success'),

            // Action de Suppression Définitive
           ForceDeleteAction::make()
            ->label('Supprimer définitivement')
            ->visible(fn () => Auth::user()?->role === 'directeur'),
            // 💡 Adapte 'directeur' ou 'admin' selon la valeur exacte dans ta BD (ex: ->hasRole('directeur'))
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePermisCorbeilles::route('/'),
        ];
    }
}

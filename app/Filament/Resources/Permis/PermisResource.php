<?php

namespace App\Filament\Resources\Permis;

use App\Filament\Resources\Permis\Pages\CreatePermis;
use App\Filament\Resources\Permis\Pages\EditPermis;
use App\Filament\Resources\Permis\Pages\ListPermis;
use App\Filament\Resources\Permis\Schemas\PermisForm;
use App\Filament\Resources\Permis\Tables\PermisTable;
use App\Models\Permis;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PermisResource extends Resource
{
    protected static ?string $model = Permis::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'permis';

    public static function form(Schema $schema): Schema
    {
        return PermisForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PermisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPermis::route('/'),
            'create' => CreatePermis::route('/create'),
            'edit' => EditPermis::route('/{record}/edit'),
        ];
    }
    
}

<?php

namespace App\Filament\Resources\DirecteurGenerals;

use App\Filament\Resources\DirecteurGenerals\Pages\CreateDirecteurGeneral;
use App\Filament\Resources\DirecteurGenerals\Pages\EditDirecteurGeneral;
use App\Filament\Resources\DirecteurGenerals\Pages\ListDirecteurGenerals;
use App\Filament\Resources\DirecteurGenerals\Schemas\DirecteurGeneralForm;
use App\Filament\Resources\DirecteurGenerals\Tables\DirecteurGeneralsTable;
use App\Models\DirecteurGeneral;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DirecteurGeneralResource extends Resource
{
    protected static ?string $model = DirecteurGeneral::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static ?string $recordTitleAttribute = 'nom';

    public static function form(Schema $schema): Schema
    {
        return DirecteurGeneralForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DirecteurGeneralsTable::configure($table);
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
            'index' => ListDirecteurGenerals::route('/'),
            'create' => CreateDirecteurGeneral::route('/create'),
            'edit' => EditDirecteurGeneral::route('/{record}/edit'),
        ];
    }
}

<?php

namespace Database\Seeders;
use App\Models\Categories;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $categories=[
            ['code' => 'A', 'label' => 'Motocyclette avec sans side-car à moteur Des plus 125 cm3'],
            ['code' => 'A1', 'label' => 'Vélomoteur et véhicules à moteur de cylindrée 50 cm3 sans excéder 125 cm3'],
            ['code' => 'A2', 'label' => 'Cyclomoteur et véhicules pourvus d\'un moteur dont le cylindre ne dépasse pas 50 cm3'],
            ['code' => 'B', 'label' => 'Véhicule de moins de 10 places et d\'un poids total autorisé en charge n\'excédant pas 3.500 kgs'],
            ['code' => 'C', 'label' => 'Véhicule affectés au transport des marchandises ou de matériel de plus de 3.500 kgs PTAC'],
            ['code' => 'D', 'label' => 'Véhicule affectés au transport des personnes et Comportant plus de 9 places assises'],
            ['code' => 'E', 'label' => 'Véhiculés des catégories BCD ou F attelés d\'une remorque de plus de 750 kgs de PTAC'],
            ['code' => 'F', 'label' => 'Véhicules de catégorie A, A1, A2, ou B spécialement aménagés'],
        ];
        foreach ($categories as $cat){
            Categories::updateOrCreate(['code' => $cat['code']], $cat);
        }
    }
}

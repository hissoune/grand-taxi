<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class cityseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $moroccanCities = [
            "Agadir",
            "Al Hoceima",
            "Assilah",
            "Azemmour",
            "Azrou",
            "Beni Mellal",
            "Berkane",
            "Berrechid",
            "Boujdour",
            "Casablanca",
            "Chefchaouen",
            "Dakhla",
            "El Aioun",
            "El Hajeb",
            "El Jadida",
            "Errachidia",
            "Essaouira",
            "Fes",
            "Figuig",
            "Fnideq",
            "Guelmim",
            "Ifrane",
            "Kenitra",
            "Khemisset",
            "Khenifra",
            "Khouribga",
            "Laayoune",
            "Larache",
            "Marrakech",
            "Martil",
            "Meknes",
            "Midelt",
            "Mohammedia",
            "Nador",
            "Ouarzazate",
            "Ouezzane",
            "Oujda",
            "Rabat",
            "Safi",
            "Salé",
            "Sefrou",
            "Settat",
            "Sidi Ifni",
            "Tangier",
            "Tan-Tan",
            "Taroudant",
            "Taza",
            "Témara",
            "Tetouan",
            "Tiznit",
            "Zagora"
        ];

        foreach ($moroccanCities as $city) {
            DB::table('cities')->insert([
                'name' => $city,
                'created_at' => now(),
                'updated_at' => now(),
                
            ]);
        }
    }
}

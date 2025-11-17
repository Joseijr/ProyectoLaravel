<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Plant;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plants = [
            [
                'name' => 'Helleborus niger',
                'description' => 'Planta perenne de flores blancas, asociada a propiedades medicinales antiguas.',
                'growth_hours' => 120,
                'water_need_per_day' => 1,
                'fertilizer_effect' => 12,
                'price' => 45,
                'image_url' => 'assets/helleborusSeed.png',
            ],
            [
                'name' => 'Belladona',
                'description' => 'Planta tóxica utilizada históricamente en medicina y alquimia.',
                'growth_hours' => 150,
                'water_need_per_day' => 1,
                'fertilizer_effect' => 15,
                'price' => 60,
                'image_url' => 'assets/belladonaSeeds.png',
            ],
            [
                'name' => 'Lavanda',
                'description' => 'Aromática y medicinal, excelente para relajación y perfumes.',
                'growth_hours' => 72,
                'water_need_per_day' => 1,
                'fertilizer_effect' => 10,
                'price' => 30,
                'image_url' => 'assets/lavandaSeeds.png',
            ],
            [
                'name' => 'Mandrágora',
                'description' => 'Planta asociada a leyendas, difícil de cultivar pero poderosa.',
                'growth_hours' => 200,
                'water_need_per_day' => 2,
                'fertilizer_effect' => 20,
                'price' => 90,
                'image_url' => 'assets/mandragoraSeed.png',
            ],
            [
                'name' => 'Albahaca',
                'description' => 'Hierba culinaria muy apreciada con crecimiento rápido.',
                'growth_hours' => 48,
                'water_need_per_day' => 2,
                'fertilizer_effect' => 8,
                'price' => 25,
                'image_url' => 'assets/albacaSeeds.png',
            ],
            [
                'name' => 'Romero',
                'description' => 'Planta aromática resistente, común en cocina y medicina.',
                'growth_hours' => 96,
                'water_need_per_day' => 1,
                'fertilizer_effect' => 10,
                'price' => 28,
                'image_url' => 'assets/romeroSeeds.png',
            ],
            [
                'name' => 'Ruta graveolens',
                'description' => 'Planta amarga usada antiguamente por sus propiedades mágicas.',
                'growth_hours' => 110,
                'water_need_per_day' => 1,
                'fertilizer_effect' => 14,
                'price' => 35,
                'image_url' => 'assets/rutaSeeds.png',
            ],
            [
                'name' => 'Diente de león',
                'description' => 'Hierba común con propiedades medicinales, fácil de cultivar.',
                'growth_hours' => 36,
                'water_need_per_day' => 1,
                'fertilizer_effect' => 5,
                'price' => 10,
                'image_url' => 'assets/leonseed.png',
            ],
        ];

        foreach ($plants as $plant) {
            Plant::firstOrCreate(['name' => $plant['name']], $plant);
        }
    }
}

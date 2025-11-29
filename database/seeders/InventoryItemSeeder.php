<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\InventoryItem;
use App\Models\InventoryItemCategory;

class InventoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener IDs por nombre de categoría
        $categories = InventoryItemCategory::pluck('id', 'name');

        $items = [
            // SEMILLAS DEL JUEGO
            ['category' => 'Seeds', 'name' => 'Helleborus niger Seed', 'price' => 45 ,'image_url' => 'assets/helleborusSeed.png'],
            ['category' => 'Seeds', 'name' => 'Belladona Seed', 'price' => 60,'image_url' => 'assets/belladonaseeds.png'],
            ['category' => 'Seeds', 'name' => 'Lavanda Seed', 'price' => 30,'image_url' => 'assets/lavandaSeeds.png'],
            ['category' => 'Seeds', 'name' => 'Mandrágora Seed', 'price' => 90,'image_url' => 'assets/mandragoraSeed.png'],
            ['category' => 'Seeds', 'name' => 'Albahaca Seed', 'price' => 25,'image_url' => 'assets/albacaSeeds.png'],
            ['category' => 'Seeds', 'name' => 'Romero Seed', 'price' => 28,'image_url' => 'assets/romeroseeds.png'],
            ['category' => 'Seeds', 'name' => 'Ruta graveolens Seed', 'price' => 35,'image_url' => 'assets/rutaseeds.png'],
            ['category' => 'Seeds', 'name' => 'Diente de León Seed', 'price' => 10,'image_url' => 'assets/leonseed.png'],

            // HERRAMIENTAS Y ABONOS
            ['category' => 'Tools', 'name' => 'Pala', 'price' => 100,'image_url' => 'assets/shovel.png'],
            ['category' => 'Fertilizer', 'name' => 'Abono Básico', 'price' => 50,'image_url' => 'assets/bolsaAbono.png'],
            ['category' => 'Tools', 'name' => 'Regadera', 'price' => 100,'image_url' => 'assets/regar.png'],
        ];

        foreach ($items as $item) {
            InventoryItem::firstOrCreate(
                ['name' => $item['name']],
                [
                    'inventory_item_category_id' => $categories[$item['category']] ?? null,
                    'price' => $item['price'],
                    'image_url' => $item['image_url'] ?? null,
                ]
            );
        }
    }
}

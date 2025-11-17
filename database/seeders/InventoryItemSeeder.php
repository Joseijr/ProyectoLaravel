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
            ['category' => 'Seeds', 'name' => 'Helleborus niger Seed', 'price' => 45],
            ['category' => 'Seeds', 'name' => 'Belladona Seed', 'price' => 60],
            ['category' => 'Seeds', 'name' => 'Lavanda Seed', 'price' => 30],
            ['category' => 'Seeds', 'name' => 'Mandrágora Seed', 'price' => 90],
            ['category' => 'Seeds', 'name' => 'Albahaca Seed', 'price' => 25],
            ['category' => 'Seeds', 'name' => 'Romero Seed', 'price' => 28],
            ['category' => 'Seeds', 'name' => 'Ruta graveolens Seed', 'price' => 35],
            ['category' => 'Seeds', 'name' => 'Diente de León Seed', 'price' => 10],

            // HERRAMIENTA
            ['category' => 'Tools', 'name' => 'Pala', 'price' => 100],

            // FERTILIZANTE
            ['category' => 'Fertilizer', 'name' => 'Abono Básico', 'price' => 50],
        ];

        foreach ($items as $item) {
            InventoryItem::firstOrCreate([
                'inventory_item_category_id' => $categories[$item['category']] ?? null,
                'name' => $item['name'],
                'price' => $item['price'],
            ]);
        }
    }
}

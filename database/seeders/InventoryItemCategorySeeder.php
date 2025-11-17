<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\InventoryItemCategory;

class InventoryItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Seeds'],
            ['name' => 'Tools'],
            ['name' => 'Fertilizer'],
        ];

        foreach ($categories as $category) {
            InventoryItemCategory::firstOrCreate(['name' => $category['name']]);
        }
    }
}

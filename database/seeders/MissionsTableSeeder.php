<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Plant;

class MissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plants = Plant::all();
        $missions = [];

        foreach ($plants as $plant) {
            $quantity = rand(5, 20);

            $missions[] = [
                'mission_statuses_id' => 1, 
                'title' => "Sell {$plant->name}",
                'description' => "Sell {$quantity} units of {$plant->name} to complete the mission.",
                'reward' => $quantity * $plant->price,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('missions')->insert($missions);
    }
}

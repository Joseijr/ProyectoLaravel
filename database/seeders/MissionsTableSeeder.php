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
       
        $statusIds = DB::table('mission_statuses')->pluck('id')->toArray();
        if (empty($statusIds)) {
            $this->command->info('No hay estados de misión. Crea algunos primero.');
            return;
        }

        $plants = Plant::all();
        $missions = [];

        foreach ($plants as $plant) {
            // Por ejemplo, vender entre 5 y 20 unidades de la planta
            $quantity = rand(5, 20);

            $missions[] = [
                'mission_statuses_id' => $statusIds[array_rand($statusIds)],
                'title' => "Vender {$quantity} unidades de {$plant->name}",
                'description' => "Vende {$quantity} unidades de {$plant->name} para completar la misión.",
                'reward' => $quantity * $plant->price, // recompensa proporcional al precio
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('missions')->insert($missions);
    }
}

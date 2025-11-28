<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GardenPlot;
use App\Models\PlantedCropStatus;
use App\Models\User;

class GardenPlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusLocked = PlantedCropStatus::where('status', 'Locked')->first();

        // Asumimos que quieres crear plots para un usuario específico
        $user = User::find(11); // cambia al ID del usuario que necesites

        if ($user && $statusLocked) {
            for ($i = 1; $i <= 8; $i++) {
                GardenPlot::firstOrCreate([
                    'user_id' => $user->id,
                    'planted_crop_status_id' => $statusLocked->id
                ]);
            }
        }
    }
}

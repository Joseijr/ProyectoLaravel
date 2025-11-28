<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PlantedCropStatus;

class PlantedCropStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['status' => 'Locked'],
            ['status' => 'Unlocked'],
            ['status' => 'Occupied'],
        ];

        foreach ($statuses as $status) {
            PlantedCropStatus::firstOrCreate(['status' => $status['status']], $status);
        }
    }
}

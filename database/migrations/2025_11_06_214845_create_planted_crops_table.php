<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('planted_crops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('garden_plots_id')->constrained('garden_plots')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('plants_id')->constrained('plants')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('planted_crop_statuses_id')->constrained('planted_crop_statuses')->cascadeOnUpdate()->restrictOnDelete();
            $table->integer('health')->default(100);
            $table->timestamp('last_watered_at')->nullable();
            $table->timestamp('last_fertilized_at')->nullable();
            $table->timestamp('harvested_at')->nullable();
            $table->char('sell_to_market', 1)->nullable(); // 'Y'/'N'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planted_crops');
    }
};

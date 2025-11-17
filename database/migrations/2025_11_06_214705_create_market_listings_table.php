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
        Schema::create('market_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plants_id')->nullable()
                  ->constrained('plants')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('market_listings_status_id')
                  ->constrained('market_listing_statuses')
                  ->cascadeOnUpdate()->restrictOnDelete();
            $table->integer('price'); // en tu diagrama es integer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_listings');
    }
};

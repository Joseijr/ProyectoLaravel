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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->decimal('weight', 5, 2)->comment('Weight in kilograms');
            $table->decimal('height', 5, 2)->comment('Height in meters');
            $table->decimal('bmi', 5, 2)->comment('Body Mass Index');
            $table->string('category')->comment('BMI Category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};

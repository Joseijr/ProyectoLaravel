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
    Schema::table('garden_plots', function (Blueprint $table) {
        $table->string('side')->default('left'); // left o right
        $table->integer('plot_index')->default(0); // 0-3 ó 4-7
    });
}

public function down(): void
{
    Schema::table('garden_plots', function (Blueprint $table) {
        $table->dropColumn(['side', 'plot_index']);
    });
}
};

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
        Schema::table('familias_profesionales', function (Blueprint $table) {
            // Creamos un String porque guardamos la referencia (path) del fichero.
            $table->string('imagen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('familias_profesionales', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
};

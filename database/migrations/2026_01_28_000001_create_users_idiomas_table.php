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
        Schema::create('users_idiomas', function (Blueprint $table) {
            $table->id();
            // campos con claves ajenas
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('idioma_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idioma_id')->references('id')->on('idiomas')->onDelete('cascade');
            // campos propios de la tabla
            $table->string('nivel');
            $table->boolean('certificado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_idiomas');
    }
};

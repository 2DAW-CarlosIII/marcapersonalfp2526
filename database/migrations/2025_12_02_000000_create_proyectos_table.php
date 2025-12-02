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
        /*
            docente_id	unsignedBigInteger	sí
            nombre	string(120)	no
            dominio	string(30)	sí
            metadatos	text	sí
        */
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->string('nombre', 120)->nullable(false);
            $table->string('dominio', 30)->nullable();
            $table->text('metadatos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};

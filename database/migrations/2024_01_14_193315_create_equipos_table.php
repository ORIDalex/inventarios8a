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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string("numeroserie", 50);
            $table->string("marca", 50);
            $table->string("modelo", 50);
            $table->string("sistemaoperativo", 50);
            $table->string("tipo", 50);
            $table->string("valor", 50);
            $table->string("anio", 50);
            $table->string("estado", 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};

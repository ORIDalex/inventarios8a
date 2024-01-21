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
        Schema::create('estaciones', function (Blueprint $table) {
            $table->id();
            $table->integer("equipos_id");
            $table->string("nodo",10);
            $table->string("piso",30);
            $table->integer("campanias_id");
            $table->string("estado",30);
            $table->string("supervisor",300);
            $table->string("visible",30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estaciones');
    }
};

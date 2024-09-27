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
        Schema::create('ukol_logy', function (Blueprint $table) {
            $table->id();                   
            $table->integer('id_ukolu');    // id úkolu
            $table->time('cas_prace');      // Čas strávený prací
            $table->integer('naklady');     // dosavadní náklady práce na úkol
            $table->date('datum');          // Datum práce na úkolu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukol_logy');
    }
};

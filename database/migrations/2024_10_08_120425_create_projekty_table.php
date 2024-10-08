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
        Schema::create('projekty', function (Blueprint $table) {
            $table->id();
            $table->string('nazev'); // Název projektu
            $table->text('popis')->nullable(); // Popis projektu
            $table->date('datum_zahajeni')->nullable(); // Datum zahájení projektu
            $table->date('datum_ukonceni')->nullable(); // Datum ukončení projektu
            $table->time('Mnozstvi_casu')->nullable(); // Datum ukončení projektu
            $table->integer('planovana_naklady')->nullable(); // Plánované náklady projektu
            $table->timestamps(); // sloupce created_at a updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projekty');
    }
};

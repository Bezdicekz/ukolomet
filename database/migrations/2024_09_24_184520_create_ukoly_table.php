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
        Schema::create('ukoly', function (Blueprint $table) {
            $table->id();
            $table->string('nazev');                    // název úkolu
            $table->string('popis');                    // popis úkolu
            $table->integer('id_uzivatele');            // id uživatele, který úkol vytvořil
            $table->integer('id_projektu');             // id projektu k němuž patří úkol
            $table->integer('id_nadrazeneho_ukolu');    // hodnota null - hlavní úkol
            $table->integer('celkovy_cas_ukolu');       // sečtený celkový čas práce na úkolu
            $table->date('datum_zahajeni');             // datum zahájení práce na úkolu
            $table->date('planovany_datum_ukonceni');   // plánované datum ukončení úkolu
            $table->date('datum_ukonceni');             // skutečné datum ukončení úkolu
            $table->string('stav');                     // stav úkolu (čeká na spuštění, v běhu, hotovo, zrušený)
            $table->integer('rozpocet');                // pránovaný rozpočet úkolu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukoly');
    }
};

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
            $table->string('nazev');                    // název projektu
            $table->string('popis');                    // popis projektu
            $table->integer('id_uzivatele');            // id uživatele kterému projekt patří
            $table->integer('rozpocet');                // rozpočet projektu
            $table->string('stav');                     // stav projektu (čeká na spuštění, v běhu, hotovo, zrušen)
            $table->date('datum_zahajeni');             // datum zahájení projektu 
            $table->date('planovany_datum_ukonceni');   // plánovaný datum ukončení projektu
            $table->date('datum_ukonceni');             // skutečné datum ukončení projektu
            $table->timestamps();
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

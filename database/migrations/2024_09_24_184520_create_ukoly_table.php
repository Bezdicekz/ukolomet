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
            $table->string('nazev');
            $table->string('popis');
            $table->string('id_uzivatele');
            $table->boolean('status');
            $table->string('id_projektu');
            $table->integer('rozpocet');
            $table->date('datum_zahajeni');
            $table->date('planovany_datum_ukonceni');
            $table->date('datum_ukonceni');
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

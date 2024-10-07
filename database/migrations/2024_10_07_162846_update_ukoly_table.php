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
        Schema::table('ukoly', function (Blueprint $table) {
            // Přidání cizího klíče pro id_uzivatele
            $table->foreignId('id_uzivatele')->change() // Změna existujícího sloupce na foreignId
                  ->constrained('users')                // Vazba na tabulku users
                  ->onDelete('cascade');                // Automatické smazání úkolů při smazání uživatele

            // Změna sloupce datum_ukonceni na nullable (nepovinný)
            $table->date('datum_ukonceni')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ukoly', function (Blueprint $table) {
            // Zrušení cizího klíče
            $table->dropForeign(['id_uzivatele']);

            // Změna sloupce datum_ukonceni zpět na povinný
            $table->date('datum_ukonceni')->nullable(false)->change();
        });
    }
};

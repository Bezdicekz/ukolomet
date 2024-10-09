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
        Schema::table('projekty', function (Blueprint $table) {
            $table->unsignedBigInteger('uzivatel_id')->after('id'); // Opravený řádek
    
            // Přidáme cizí klíč na uživatelskou tabulku (users)
            $table->foreign('uzivatel_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projekty', function (Blueprint $table) {
            $table->dropForeign(['uzivatel_id']);
            $table->dropColumn('uzivatel_id');
        });
    }
};

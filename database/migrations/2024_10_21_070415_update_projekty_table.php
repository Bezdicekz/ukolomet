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
            // Změna typu sloupce Mnozstvi_casu na decimal s dvěma desetinnými místy
            $table->decimal('Mnozstvi_casu', 10, 2)->nullable()->change();
            // Změna typu sloupce planovana_naklady na decimal s dvěma desetinnými místy
            $table->decimal('planovana_naklady', 10, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projekty', function (Blueprint $table) {
            // Obnovení původního typu sloupce Mnozstvi_casu
            $table->time('Mnozstvi_casu')->nullable()->change();
            // Obnovení původního typu sloupce planovana_naklady
            $table->integer('planovana_naklady')->nullable()->change();
        });
    }
};

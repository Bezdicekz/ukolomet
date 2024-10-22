<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUkolyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukoly', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nazev', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('popis', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->unsignedBigInteger('id_uzivatele');
            $table->integer('id_projektu')->nullable();
            $table->integer('id_nadrazeneho_ukolu')->nullable();
            $table->integer('celkovy_cas_ukolu')->nullable();
            $table->date('datum_zahajeni')->nullable();
            $table->date('planovany_datum_ukonceni')->nullable();
            $table->date('datum_ukonceni')->nullable();
            $table->string('stav', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->integer('rozpocet')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_uzivatele')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ukoly');
    }
}

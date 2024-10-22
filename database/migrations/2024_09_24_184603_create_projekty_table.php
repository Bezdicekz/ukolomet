<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjektyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projekty', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('uzivatel_id');
            $table->string('nazev', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('popis')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->date('datum_zahajeni')->nullable();
            $table->date('datum_ukonceni')->nullable();
            $table->integer('Mnozstvi_casu')->nullable();
            $table->integer('planovane_naklady')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('uzivatel_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projekty');
    }
}

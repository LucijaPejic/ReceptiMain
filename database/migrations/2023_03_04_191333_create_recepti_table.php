<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepti', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->string('sastojci');
            $table->string('opis');
            $table->string('priprema');
            $table->string('vrijeme_pripreme');
            $table->string('slika');
            $table->foreignId('korisnik_id')->constrained('users');
            $table->foreignId('kategorija_id')->constrained('kategorije');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recepti');
    }
}

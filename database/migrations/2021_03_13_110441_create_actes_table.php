<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actes', function (Blueprint $table) {
            $table->id();
            $table->string('montant')->unique();
            $table->string('reseau')->unique();
            $table->string('nreference')->unique();
            $table->unsignedbigInteger('rechargement_id')->index();
            $table->timestamps();

            $table->foreign('rechargement_id')->references('id')->on('rechargements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actes');
    }
}

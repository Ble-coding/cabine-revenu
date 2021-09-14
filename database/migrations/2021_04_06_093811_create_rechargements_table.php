<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rechargements', function (Blueprint $table) {
            $table->id();
            $table->date('datere');
            $table->string('reseau');
             $table->string('montant');
              $table->string('nreference');
            $table->unsignedbigInteger('fournisseur_id')->index();
            // $table->unsignedbigInteger('reseau_id')->index();
            $table->timestamps();

            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rechargements');
    }
}

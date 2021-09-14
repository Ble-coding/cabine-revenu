<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('activites', function (Blueprint $table) {
    //         $table->id();
    //         $table->date('date');
    //         // $table->string('montant');
    //         $table->unsignedbigInteger('fournisseur_id')->index();
    //         // $table->unsignedbigInteger('reseau_id')->index();
    //         $table->timestamps();

    //         $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
    //         // $table->foreign('reseau_id')->references('id')->on('reseaus');
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activites');
    }
}

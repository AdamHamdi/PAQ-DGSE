<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_act');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->biginteger('res_action_id')->unsigned();
            $table->foreign('res_action_id')->references('id')->on('res_actions')->onDelete('cascade');
            $table->biginteger('domaine_id')->unsigned();
            $table->foreign('domaine_id')->references('id')->on('domaines')->onDelete('cascade');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('budget_total');
            $table->float('budget_annee'); 
            $table->float('budget_reste');
            $table->float('budget_insuffisant');
            $table->biginteger('domaine_id')->unsigned();
            $table->foreign('domaine_id')->references('id')->on('domaines')->onDelete('cascade');
            $table->biginteger('action_id')->unsigned();
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('cascade');
         
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
        Schema::dropIfExists('budgets');
    }
}

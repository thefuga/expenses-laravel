<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_budgets', function (Blueprint $table) {
	    $table->bigIncrements('id');
	    $table->bigInteger('starting_balance')->default(0);
	    $table->bigInteger('end_balance')->default(0);
	    $table->unsignedBigInteger('expected_incomings')->default(0);
	    $table->unsignedBigInteger('expected_expenses')->default(0);
	    $table->string('month', 16)->default(date('F'));
	    $table->string('year', 4)->default(date('Y'));
	    $table->unsignedBigInteger('user_id');
	    $table->foreign('user_id')
		  ->references('id')
	  	  ->on('users')
	  	  ->onDelete('cascade');
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
        Schema::dropIfExists('monthly_budgets');
    }
}

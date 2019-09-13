<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
	    $table->bigIncrements('id');
	    $table->string('type', 32); # Expense or Income
	    $table->date('date')->nullable();
	    $table->unsignedBigInteger('ammount'); # This is the value in cents
	    $table->string('description', 128); # This is what the transaction repersent
	    $table->string('category', 32)->index(); # The category the transacion is in (e.i. heath, food, home')
	    $table->string('channel', 32)->index(); # The channel in which the transaction was generated (i.e. a credit card)
	    $table->string('status', 16)->default('not paid')->index(); # Status of the transaction (i.e. paid, not paid, received)
	    $table->unsignedBigInteger('monthly_budget_id');
	    $table->foreign('monthly_budget_id')
		  ->references('id')
	  	  ->on('monthly_budgets')
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
        Schema::dropIfExists('transactions');
    }
}

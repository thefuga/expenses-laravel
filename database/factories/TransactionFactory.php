<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
	'type' => ['expense', 'incoming'][rand(0, 1)],
	'date' => $faker->date,
	'ammount' => rand(0, 9223372036854775807),
	'description' => $faker->text($maxNbChars = 128),
	'category' => $faker->text($maxNbChars = 32),
	'channel' => ['bank_account', 'credit_card', 'cash'][rand(0, 2)],
	'status' => ['paid', 'not_paid', 'postponed'][rand(0, 2)],
    ];
});

$factory->state(Transaction::class, 'with_monthly_budget', [])
	->afterMakingState(
	    Transaction::class, 
	    'with_monthly_budget',
	    function ($transaction) {
		$transaction->monthly_budget = 
		    factory(App\MonthlyBudget::class)->make();
	    }
	);

$factory->state(Transaction::class, 'expense', ['type' => 'expense']);

$factory->state(Transaction::class, 'incoming', ['type' => 'incoming']);

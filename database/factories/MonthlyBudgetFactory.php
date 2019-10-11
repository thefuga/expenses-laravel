<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MonthlyBudget;
use Faker\Generator as Faker;

$factory->define(MonthlyBudget::class, function (Faker $faker) {
    return [
	'starting_balance' => rand(-9223372036854775808, 9223372036854775807),
	'end_balance' => rand(-9223372036854775808, 9223372036854775807),
	'expected_incomings' => rand(0, 9223372036854775807),
	'expected_expenses' => rand(0, 9223372036854775807),
	'user_id' => factory(App\User::class)->lazy()
    ];
});

$factory->state(MonthlyBudget::class, 'with_expense', [])
	->afterMakingState(
	    MonthlyBudget::class,
	    'with_expense',
	    function($monthly_budget, $faker) {
		$monthly_budget->transactions->push(
		    factory(App\Transaction::class)->states('expense')->make()
		);
	    }
	);

$factory->state(MonthlyBudget::class, 'with_incoming', [])
	->afterMakingState(
	    MonthlyBudget::class,
	    'with_expense',
	    function($monthly_budget, $faker) {
		$monthly_budget->transactions->push(
		    factory(App\Transaction::class)->states('incoming')->make()
		);
	    }
	);

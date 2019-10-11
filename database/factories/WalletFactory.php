<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Wallet;
use Faker\Generator as Faker;

$factory->define(Wallet::class, function (Faker $faker) {
    return [
	'current_balance' => rand(0, 9223372036854775807),
	'currency' => 'BRL'
    ];
});

$factory->state(Wallet::class, 'with_user', [])
	->afterMakingState(
	    Wallet::class, 
	    'with_user',
	    function ($wallet, $faker) {
		$wallet->user = factory(App\User::class)->make();
	    }
	);

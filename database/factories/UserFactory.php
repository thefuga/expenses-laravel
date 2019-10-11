<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
    ];
});

$factory->state(User::class, 'with_wallet', [])
	->afterMakingState(
	    User::class,
	    'with_wallet',
	    function($user, $faker) {
		$user->wallet = factory(App\Wallet::class)->make();
	    }
	);

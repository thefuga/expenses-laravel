<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function wallet()
    {
	return $this->hasOne('Wallet');
    }

    public function monthlyBudgets()
    {
	return $this->hasMany('MonthlyBudget');
    }
}

:q

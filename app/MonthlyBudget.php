<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyBudget extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    
    public function expenses()
    {
        return $this->hasMany(Transaction::class)->expenses();
    }
    
    public function incomings()
    {
        return $this->hasMany(Transaction::class)->incomings();
    }
    
    public function actualIncomings()
    {
        return $this->incomings()->sum('ammount');
    }
    
    public function actualExpenses()
    {
        return $this->expenses()->sum('ammount');
    }
    
    public function diffIncomings()
    {
	return ($this->expected_incomings - $this->actualIncomings());
    }
    
    public function diffExpenses()
    {
        return $this->expected_expenses - $this->actualExpenses();
    }
    
    public function endBalance()
    {
        return ($this->starting_balance + $this->actualIncomings()) - 
        	$this->actualExpenses();
    }
    
    public function ammountSaved()
    {
        return $this->endBalance() + $this->starting_balance;
    }
}

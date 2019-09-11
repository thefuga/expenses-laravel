<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyBudget extends Model
{
    public function user()
    {
        return $this->belongsTo('User');
    }
    
    public function transactions()
    {
        return $this->hasMany('Transaction');
    }
    
    public function expenses()
    {
        return $this->hasMany('Transaction')->expenses();
    }
    
    public function incomings()
    {
        return $this->hasMany('Transaction')->incomings();
    }
    
    public function actualIncomings()
    {
        return $this->incomings->sum('ammount');
    }
    
    public function actualExpenses()
    {
        return $this->expenses->sum('ammount');
    }
    
    public function diffIncomings()
    {
        return $this->expected_incomings - $this->actualIncomings();
    }
    
    public function diffExpenses()
    {
        return $this->expected_expenses - $this->actualExpenses();
    }
    
    public function endBalance()
    {
        return ($this->starting_balance + $this->incomings->sum('ammount')) - 
        	$this->expenses->sum('ammount');
    }
    
    public function ammountSaved()
    {
        return endBalance() - starting_balance;
    }
}

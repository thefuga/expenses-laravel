<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function monthlyBudget()
    {
	return $this->belongsTo('MonthlyBudget');
    } 

    public function scopeExpenses($query)
    {
	return $query->where('type', 'expense');
    }
    
    public function scopeIncomings($query)
    {
	return $query->where('type', 'incoming');
    }
}

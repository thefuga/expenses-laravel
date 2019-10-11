<?php 

use Tests\TestCase;

class MonthlyBudgetTest extends TestCase
{
    public function testActualIncomings()
    {
	$incomings = collect([
	    factory('App\Transaction')->states('incoming')->make(),
	    factory('App\Transaction')->states('incoming')->make()
	]);

	$monthly_budget = 
	    \Mockery::mock(App\MonthlyBudget::class)->makePartial();
	$monthly_budget->shouldReceive('incomings')->andReturn($incomings);

	$this->assertEquals($incomings[0]->ammount + $incomings[1]->ammount, 
			    $monthly_budget->actualIncomings());
    }

    public function testDiffIncomings()
    {
	$monthly_budget = 
	    \Mockery::mock(App\MonthlyBudget::class)->makePartial();
	$monthly_budget->expected_incomings = 10;
	$monthly_budget->shouldReceive('actualIncomings')->andReturn(10);

	$this->assertEquals(0, $monthly_budget->diffIncomings());
    }

    public function testDiffExpenses()
    {
	$monthly_budget = 
	    \Mockery::mock(App\MonthlyBudget::class)->makePartial();
	$monthly_budget->expected_expenses = 10;
	$monthly_budget->shouldReceive('actualExpenses')->andReturn(10);

	$this->assertEquals(0, $monthly_budget->diffExpenses());

    }

    public function testAmmountSaved()
    {
	$monthly_budget = 
	    \Mockery::mock(App\MonthlyBudget::class)->makePartial();
	$monthly_budget->starting_balance = 10;
	$monthly_budget->shouldReceive('endBalance')->andReturn(10);

	$this->assertEquals(20, $monthly_budget->ammountSaved());
    }

    public function testEndBalance()
    {
	$monthly_budget = 
	   \Mockery::mock(App\MonthlyBudget::class)->makePartial();
	$monthly_budget->starting_balance = 10;
	$monthly_budget->shouldReceive('actualIncomings')->andReturn(10);
	$monthly_budget->shouldReceive('actualExpenses')->andReturn(20);

	$this->assertEquals(0, $monthly_budget->endBalance());
    }
}

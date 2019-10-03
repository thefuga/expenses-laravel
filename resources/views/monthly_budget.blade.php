@extends('layout')

@section('currentMonth', "{$monthlyBudget->month}/{$monthlyBudget->year}")

@section('body')
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Overview</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
    	
        </ul>	
    </div>
</nav>

<div class"container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
    	<h2>Balance</h2>
    	<div class="row">
    	    <div class="col-sm-4">
    	        <h5>Starting</h5>
    	        <p>{{ $monthlyBudget->start_balance }}</p>
    	    </div>
    	    <div class="col-sm-4">
    	        <h5>End</h5>
    	        <p>{{ $monthlyBudget->end_balance }}</p>
    	    </div>
    	</div>
        </div>
        <div class="col-sm-4">
    	<h2>Savings</h2>
    	<div class="row">
    	    <div class="col-sm-4">
    		<h5>Ammount</h5>
    		<p>{{ $monthlyBudget->ammountSaved() }}</p>
    	    </div>
    	</div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
    	<h2>Expenses</h2>
    	<table class="table table-dark">
    	    <thead>
    		<tr>
    		    <th>Category</th>
    		    <th>Planned</th>
    		    <th>Actual</th>
    		    <th>Diff</th>
    		</tr>
    	    </thead>
    	    <tbody>
    		<tr>
    		    <td></td>
    		</tr>
    	    </tbody>
    	</table>
        </div>
        <div class="col-sm-4">
    	<h2>Incomings</h2>
    	<table class="table table-dark">
    	    <thead>
    		<tr>
    		    <th>Category</th>
    		    <th>Planned</th>
    		    <th>Actual</th>
    		    <th>Diff</th>
    		</tr>
    	    </thead>
    	    <tbody>
    		<tr>
    		    <td></td>
    		</tr>
    	    </tbody>
    	</table>

        </div>
    </div>
</div>
@endsection

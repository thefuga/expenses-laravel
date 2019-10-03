<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>@yield('title', 'Expenses')</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
	<ul class="navbar-nav"
	    <li class="nav-item">
		<div class="dropdown">
		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
		    @yield('currentMonth', 'Month')
		</button>
       	        <div class="dropdown-menu">
		    @foreach(App\MonthlyBudget::all() as $monthlyBudget)
			<a class="dropdown-item" href="{{ URL::route('monthly_budgets.show', $monthlyBudget->id) }}">
			    {{ $monthlyBudget->month }}/{{ $monthlyBudget->year }}
		    	</a>
		    @endforeach
       	        </div>
		</div>
       	    </li>
	</ul>
    </nav>
    
    <div class="jumbotron text-center" style="margin-bottom:0">
	<h1>Monthly Budget</h1>
    </div>
    
    @yield('body')
</body>

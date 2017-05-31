@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            @foreach($rates as $rate)
            <p>
                provider:<span style="color: red"> {{ $rate['provider'] }} </span>
                Level  : <span style="color: red"> {{ $rate['servicelevel']['name'] }} </span>
                Amount: <span style="color: red"> {{ $rate['amount'] }}  {{ $rate['currency']}} </span>
                To delivery: <span style="color: red"> {{ $rate['days'] }} </span> days <br>
            </p>
            @endforeach 
        </div>
    </div>
</div>
@endsection

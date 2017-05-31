@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h3> {{ $brand }} </h3>
            <img src="{{ $images }}" class="img-circle" alt="Image" style="width: 150px; height: 150px;" >
            <p>Title : {{ $title }}</p>
            @if(!empty($dimension))
            <p> 
                dimension :  {{ $dimension }} <br> weight : {{ $weight }} <br>
            </p>
             @else
             <div class="alert alert-warning">
                {{ $noD_W }}
             </div>
             @endif
        </div>
        <div class="col-md-12  text-center">
            @foreach($rates as $rate)
            @if ( count($rates) == 3)
                <div class="col-md-4">    
            @else
                <div class="col-md-3">    
            @endif
            
                    <br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $rate['provider'] }}</h3>
                    </div>
                    <div class="panel-body panel-primary">
                    Services : {{ $rate['servicelevel']['name'] }}             <br> <br>
                    Price : {{ $rate['amount'] }} {{ $rate['currency']}}        <br> <br>
                    Delivering : {{ $rate['days'] }} Days                        <br> <br>
                    </div>
                </div>
            </div>
               
            @endforeach 
        </div>
    </div>
</div>
@endsection

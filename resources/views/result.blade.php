@extends('layouts.App')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2 text-center">
          <h4> {{ $amount }} {{ $from }} </h4>
        </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
             <p>  {{ $ratez_one_Currency }} {{ $to['0'] }} </p>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
            <p>   {{ $ratez_two_Currency }} {{ $to['1'] }} </p>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
            <p>   {{ $ratez_three_Currency }} {{ $to['2'] }} </p>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
            <p>   {{ $ratez_four_Currency }} {{ $to['3'] }} </p>
            </div> 
           
        
    </div>
</div>
@endsection

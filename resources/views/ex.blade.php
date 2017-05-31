@extends('layouts.App')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
        </div>
        <form action="/convert" method="GET" role="form">
        <br>
            From :
                <select name="from" id="input" class="form-control" required="required">
                        @foreach($list_name as $from_key => $from_value)
                         <option value="{{ $from_key }}">{{$from_value}}  {{ $from_key }} </option>
                         @endforeach                
                     </select>
            
                     
            Amount:
                <input type="text" name="amount" id="amount" class="form-control" required="required" >
                <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

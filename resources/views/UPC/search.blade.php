@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="/getdimension" method="GET" role="form">
            <br>
                <p>UPC Code :</p>
                    <input type="text" name="UPC" id="UPC" class="form-control" required="required" placeholder="Enter UPC" >
                    <br>
                    <div class=" col-md-4 col-md-offset-4 ">
                        
                <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

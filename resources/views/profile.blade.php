@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <img src="/uploed/avater/{{ Auth::user()->avater }}" style="width:150px;height:150px ;border-radius:50%;float:left; margin-right: 10px;">
            <h1>{{ Auth::user()->name }} Profile</h1>
        </div>     
            <div class="col-md-4">
                <div class="row"> 
                <details class="col-md-10 col-md-offset-1">
                    <summary>Change Your Avater</summary>
                        @include('change')
                    </details>
                    <details class="col-md-10 col-md-offset-1">
                        <summary>Change Your Password</summary>
                        @include('changepassword')
                    </details>
                    
                </div>
              @include('layouts.errors')

            </div>
            <!-- ============================================== -->

                
            <!-- ============================================== -->
        </div>
    </div>
@endsection

@extends('layouts.master')
@section('content')
test

<!-- <div class="container text-center">

	<button class="success btn btn-success">Success</button>

	<button class="error btn btn-danger">Error</button>

	<button class="info btn btn-info">Info</button>

	<button class="warning btn btn-warning">Warning</button>

</div>	 -->
@if (count(Auth::user()->unreadNotifications))
	@foreach (Auth::user()->unreadNotifications as $notification)
	<li> {{ $notification->type }} </li>
	<li>{{-- {{ $notification->data['message'] }} --}}</li>
	@endforeach

	<form action="/users/{{ Auth::id() }}/notifications" method="POST">
		{{ method_field('DELETE') }}
		{{ csrf_field() }}
		<button type="submit" class="btn btn-primary">Mark As Read</button>
	</form>
@endif

@endsection

@push('scripts')
<!-- <script type="text/javascript">
	$(".success").click(function(){

		toastr.success('We do have the Kapua suite available.', 'Success Alert', {timeOut: 5000})

	});


	$(".error").click(function(){

		toastr.error('You Got Error', 'Inconceivable!', {timeOut: 5000})

	});


	$(".info").click(function(){

		toastr.info('It is for your kind information', 'Information', {timeOut: 5000})

	});


	$(".warning").click(function(){

		toastr.warning('It is for your kind warning', 'Warning', {timeOut: 5000})

	});

</script> -->
@endpush


@extends('layouts.master')
@section('content')
<form action="{{ url('comment/'. $comment->id)}}" class="col-sm-6 col-sm-offset-3" method="post">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
	<legend>Edit {{$comment->body}} </legend>
	<div class="form-group">
		<label for="message">Title</label>
		<input type="text" name="body" class="form-control" id="body" placeholder="title" value="{{ $comment->body }}" >
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
<div>

</div>
@endsection

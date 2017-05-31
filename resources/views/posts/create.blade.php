@extends('layouts.master')
@section('content')
<form action="/posts" method="POST" class="col-sm-6 col-sm-offset-3">
	{{ csrf_field() }}
	<legend>Add New Post </legend>
	<div class="form-group">
		<label for="message">Title</label>
		<input type="text" name="message" class="form-control" id="message" placeholder="title" >
	</div>
	<div class="form-group">
		<label for="notes">Post</label>
		<textarea name="notes" id="notes" class="form-control" rows="3" required="required"></textarea>
		<label for="tag">Tag</label>
		<input type="text" name="tags" id="tags" class="form-control">
	</div>
	<button type="submit" class="btn btn-primary pull-right">Submit</button>
</form>
@endsection
@push('scripts')
<script>
$( document ).ready(function() {
    $('#tags').selectize({
        delimiter: ',',
        persist: false,
        valueField: 'tag',
        labelField: 'tag',
        searchField: 'tag',
        options: tags,
        create: function(input) {
            return {
                tag: input
            }
        }
    });
});
    var tags = [
	    @foreach ($tags as $tag)
	    {tag: "{{$tag}}" },
	    @endforeach
	];

</script>
@endpush
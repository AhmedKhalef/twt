
@extends('layouts.master')
@section('content')

<form action="{{ url('posts/'. $post->id)}}" class="col-sm-6 col-sm-offset-3" method="post">
	{{ method_field('PUT') }}
	{{ csrf_field() }}
	<legend>Edit {{$post->message}} </legend>
	<div class="form-group">
		<label for="message">Title</label>
		<input type="text" name="message" class="form-control" id="message" placeholder="title" value="{{ $post->message }}" >
	</div>
	<div class="form-group">
		<label for="notes">Post</label>
<!-- 		<input type="text" name="notes" class="form-control" id="notes" placeholder="Input field" value="{{ $post->notes }}" >
 -->
		<textarea type="text" name="notes" class="form-control" id="notes" placeholder="Input field" >{{ $post->notes }}</textarea>

			<div class="pull-right">
				<label for="tag">Tags</label>
				@foreach($post->tagged as $tag) 
					<span class="badge"> {{ $tag->tag_name }}</span> 
				@endforeach
			</div>		
		<input type="text" name="tags" id="tags" class="form-control">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
<div>
</div>
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
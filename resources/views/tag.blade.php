<div class="list-group">
	@foreach ($tagged as $tag)
		<div class="list-group-item">
	    	{{$tag->message}}
	    	<br>
	    	{{$tag->notes}} <br>
	    	{{$tag->id}} <br>
	    	{{$tag->body}} <br>
	    	@foreach ($tag->comments as $comment)
		    	{{$comment->body}} <br>
	   		@endforeach
	   		<hr>
	   	</div> 
	@endforeach
</div >

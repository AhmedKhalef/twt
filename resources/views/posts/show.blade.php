@extends('layouts.master')
@section('content')
		
	<div class="panel panel-default col-sm-6 col-sm-offset-3">
		  <div class="panel-heading">
					<div class="row"  style="margin-bottom: 0;">
					<!-- === Right Side === -->
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<!-- === Image user === -->
							<img src="/uploed/avater/{{ Auth::user()->avater }}" style="width:50px;height:50px ;border-radius:50%;float:left; margin-right: 10px;">
							<!-- === User Name === -->
							<a  href="#"><h4>{{ $post->user->name }}</h4></a>
							<!-- === Post Time === -->
							<p>{{ $post->created_at->diffForHumans() }}</p>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
						<!-- === Center Side === -->
						<!-- === Post Title ===  -->
							<a href="{{ url('posts/'.$post->id)}}"><h4>{{ $post->message }}</h4> </a>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<!-- === Left Side === -->
		   					<div class="pull-right dropdown" style="list-style: none;">	
    		        	    	<i class="fa fa-angle-double-down dropdown-toggle" data-toggle="dropdown"></i>
            		        	<ul class="dropdown-menu" role="menu">
                            	<li>
	        					  	@if($post->user->name == Auth::user()->name)
	                                <a class="btn" href="{{ url('posts/'.$post->id.'/edit')}}">Edit </a>
	                                <form action="{{ url('posts/'. $post->id)}}" method="post" style="margin-bottom: 0;">
										{{ method_field('DELETE') }}
										{{ csrf_field() }}
	                                	<button class="btn btn-block btn-danger" type="submit" onclick="confirm('are you sure?')">Delete</button>
	                                </form>	
	                                @else
						 			<li>hide</li>
	    							<!-- Hide the post -->
	                                @endif       
                            	</li>
                        		</ul>
                			</div>
					</div>
				</div>
			</div>
		  <div class="panel-body">
	    	<p>{{ $post->notes }}</p>
	  	</div>
	  	<!-- ========= Start Comments Section ======== -->
			<div class="list-group">
		    	@foreach ($post->comments as $comment)
				<div class="list-group-item">
			    	<span>{{ $comment->user->name }} :  </span>
			    	{{$comment->body}}
					@if($comment->user->name == Auth::user()->name)
					<div class="btn-group pull-right">
					<!-- edit -->
                        <a class="btn btn-link" href="{{ url('comment/'.$comment->id.'/edit')}}">Edit </a>
					<!-- Delete -->

					<form class="btn-group form-inline" action="{{ url('comment/'. $comment->id)}}" method="POST">
						{{ method_field('DELETE') }}
						{{ csrf_field() }}
                    	<input class=" btn btn-link" type="submit" value="DELETE">
                    </form>
					</div>
					@endif
			   	</div> 
			   		@endforeach
			</div >
			<div class="pull-right">
				<label for="tag">Tags</label>
				@foreach($post->tagged as $tag) 
					<span class="badge"> {{ $tag->tag_name }}</span>
				@endforeach
			</div>
			
			<!-- ========= End Comments Section ======== -->
			<div class="clearfix"></div>
			<form action="{{ url('/comment')}}" method="POST" role="form">	
					{{ csrf_field() }}
				<div class="form-group form-inline">
					<input type="hidden" name="post_id" value="{{ $post->id }}">
					<input type="text" class="form-control" name="body" placeholder="Type Your Comment" style="width:70%;">
					<button type="submit" class="btn btn-primary pull-right" style="width:25%;">comment</button>
					
				</div>
			</form>
			
	</div>

@endsection

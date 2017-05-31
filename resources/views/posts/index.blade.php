@extends('layouts.master')
@section('content')
	<div class="blog-header text-center">
        <h1 class="blog-title">Blog </h1>

    </div>
    <!-- =========== Posts============ -->
	<div class="row">
		@foreach ($posts as $post)
		<div class="col-sm-8 col-md-offset-2 col-sm-offset-2">
			<div class="panel panel-default">
				<!-- Default panel contents -->
    			<!-- ========= Start Header Post =========-->
				<div class="panel-heading">
					<div class="row"  style="margin-bottom: 0;">
					<!-- === Right Side === -->
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<!-- === Image user === -->
							<img src="/uploed/avater/{{ Auth::user()->avater }}" style="width:60px;height:60px ;border-radius:50%;float:left; margin-right: 10px;">
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
					  	@if($post->user->name == Auth::user()->name)
    		        	    	<i class="fa fa-angle-double-down dropdown-toggle" data-toggle="dropdown"></i>
            		        	<ul class="dropdown-menu" role="menu">
                            	<li>
	                                <a class="btn" href="{{ url('posts/'.$post->id.'/edit')}}">Edit </a>
	                                <form action="{{ url('posts/'. $post->id)}}" method="post" style="margin-bottom: 0;">
										{{ method_field('DELETE') }}
										{{ csrf_field() }}
	                                	<button class="btn btn-block btn-danger" type="submit" onclick="confirm('are you sure?')">Delete</button>
	                                </form>	
	                                
                            @endif       
                            	</li>
                        		</ul>
                			</div>
					</div>
				</div>
			</div>
				<!-- ========= End Header Post =========-->
				<!-- ========= Start Body Post ======== -->
			<div class="panel-body text-center" style="padding: 0;">
				<p style="margin: 15px 0px;">
					{{ $post->notes }}
				</p>
				<hr>	
			</div>
			@if (Auth::check())
	        		<favorite
	            	:post={{ $post->id }}
	            	:favorited={{ $post->favorited() ? 'true' : 'false' }}
	        		></favorite>
			@endif
			
				<span class="badge" style="background-color: #f65;">
				 {{count($post->favorites)}} 
				</span>
					
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 pull-right">
				@foreach($post->tagged as $tag) 
					<span class="badge"><a href="{{ url('tag/'.$tag->tag_slug)}}"  style="color: #fff;"> {{ $tag->tag_name }}</a></span>
				@endforeach
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 pull-right">
			<span>Liked :</span>
			 @foreach ($post->favorites as $myFavorite)
				@if($myFavorite->user->name == Auth::user()->name)
					You,
				@else
					{{ $myFavorite->user->name }}
				@endif
			@endforeach 
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
				<p>comments : <span class="">{{count($post->comments)}}</span></p>
			</div>
			

				
			
            
			<!-- ========= End Body Post ======== -->
			<!-- ========= Start Comments Section ======== -->
		<div class="clearfix"></div>
        <p >Comments</p>
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
			<!-- ========= End Comments Section ======== -->
			<!-- ========= Add Comment For Post ========  -->
			<div class="clearfix"></div>
			
			<form action="{{ url('/comment')}}" method="POST" role="form" style="padding: 5px;">	
				{{ csrf_field() }}
				<div class="form-group form-inline">			
					<input type="hidden" name="post_id" value="{{ $post->id }}">
					<input type="text" class="form-control" name="body" placeholder="Type Your Comment" style="width:70%;">
					<button type="submit" class="btn btn-primary pull-right" style="width:25%;">comment</button>
				</form>
			</div>
			<!-- ========= End Add Comment For Post ========  -->
			<!-- ========= Url To Add New Post ============== -->
		</div>
	</div>
	@endforeach
	<div class="clearfix">
	
	</div>
</div>	
<a href="{{ url('posts/create')}}" class="btn btn-primary" style="margin:5px 40%;">add new post</a>

@endsection
      
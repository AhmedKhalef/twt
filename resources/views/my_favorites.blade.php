@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h3>My Favorites</h3>
            </div>
            @forelse ($myFavorites as $myFavorite)
                    
            <div class="panel-heading">
                <div class="row"  style="margin-bottom: 0;">
                    <div class="panel-heading text-center">
                        <!-- === Center Side === -->
                        <!-- === Post Title ===  -->
                            <a href="{{ url('posts/'.$myFavorite->id)}}"><h4>{{ $myFavorite->message }}</h4> </a>

                    <div class="pull-right">
                        @foreach($myFavorite->tagged as $tag) 
                            <span class="badge"><a href="{{ url('tag/'.$tag->tag_slug)}}"> {{ $tag->tag_name }}</a></span>
                        @endforeach
                    </div>
                        </div>
                </div>
            </div>

                        <!-- =================== -->
                    <div class="panel-body">
                        {{ $myFavorite->notes }}
                    </div>
                    @if (Auth::check())
                        <div class="panel-footer">
                            Like You and :{{ $myFavorite->user->name }}
                        </div>
                    @endif
                
                <div class="list-group">
                @foreach ($myFavorite->comments as $comment)
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
            @empty
                <p>You have no favorite posts.</p>
            @endforelse
         </div>
    </div>
</div>
@endsection
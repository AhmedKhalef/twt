<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Carbon\Carbon;
use App\Post;
use App\User;

use App\Favorite;


class PostController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        // $posts = Post::all(); // Auth::user()->posts;
        $posts = Post::latest()->with('tagged')->get();
        // $fav = Favorite::where('post_id','$post->id')->get();         
        
        // $userid = $posts()->user_id; 
        // $usname = User::find($userid)->name();
               
        return View('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $tags = Tag::all();
        $tags = Post::existingTags()->pluck('name');
        return view('posts.create', compact('tags'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        // return $request->all();
        // dd($request->input('tag'));
        // validate 
        $this->validate($request, [
                'message' => 'required',
                'notes' => 'required'
            ]);

        $post = Auth::user()->posts()->create([
                'message' => $request->input('message'),
                'notes' => $request->input('notes')
            ]);
        if ($request->tags) {
            $post->tag(explode(',', $request->tags));
        }
        
        return Redirect::to('posts');
        
    }  
     

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return View('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $tags = Post::existingTags()->pluck('name');

       return View('posts.edit', compact('post', 'tags'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $post->update([
                'message' => $request->input('message'),
                'notes' => $request->input('notes')
            ]
            // request(['message','author','notes'])
            );
        if ($request->tags) {
            $post->tag(explode(',', $request->tags));
        }
        
        return Redirect::to('posts/');

    }

    /**
     * Remove the specified resource from storage.
     
     * @param  \App\Post  $post
     * @return \Illuminate\Http\R
     esponse
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return Redirect::to('posts/');

    }
    // ============================================

    public function favoritePost(Post $post)
    {
        // Auth::user()->notify(new PostLike($post));
        Auth::user()->favorites()->attach($post);

        return back();
    }

    /**
     * Unfavorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function unFavoritePost(Post $post)
    {
        Auth::user()->favorites()->detach($post);

        return back();
    }
}

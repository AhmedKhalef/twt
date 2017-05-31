<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Carbon\Carbon;
use App\Comment;
use App\Post;


class CommentController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }
     
    public function store(Request $request)
    {
        $post = Post::find($request->input('post_id'));

        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->post_id = $post->id;

        $commenting = Auth::user()->comments()->save($comment);

        return Redirect::to('posts');
    }

    public function edit(Comment $comment)
    {
        //
        return View('comment.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        //
        $comment->update([
                'body' => $request->input('body')            ]
            );
        return Redirect::to('posts/');
    }

    
    public function destroy(Comment $comment)
    {
        //
        $comment->delete();
        return Redirect::to('posts/');
    }
}

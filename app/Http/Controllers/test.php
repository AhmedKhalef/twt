<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Blognotification;
use App\Notifications\PostLike;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications;

use Event;
use App\Events\LikePostEvent;
use App\User;
use App\Post;
use Auth;

// Auth::loginUsingId(1);



class test extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    

    public function index()
    {
        $post = Post::first();
        // Auth::user()->notify(new PostLike($post));

    	// Auth::user()->notify(new Blognotification);

      return View('comment.test');
    }

    public function markasread(User $user)
    {

    $user->unreadNotifications->map(function($n){
            $n->markAsRead();
        });
      return back();
    }

}
//

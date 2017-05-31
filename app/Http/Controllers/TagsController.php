<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Post;
use App\Comment;

class TagsController extends Controller
{
    public function index($tag_slug)
    {
 // $tagged = Post::withAnyTag([$tag_slug])->get(); 

         $tagged = Post::latest()->withAllTags($tag_slug)->get();
// return $tagged = Post::withAnyTag([$tag_slug])->get(); // Done
        // $tagged = Post::latest()->with($tag_slug)->get();

    	return view('tag',compact('tagged'));
    }
    
 
}

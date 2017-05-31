<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

use Auth;
// use App\Favorite;

class Post extends Model
{
    use Taggable;
    //
    protected $guarded = [];
    
    public function comments(){

    	return $this->hasMany('App\Comment');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function favorited()
    {
    return (bool) Favorite::where('user_id', Auth::id())
                        ->where('post_id', $this->id)
                        ->first();
    }
    
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}

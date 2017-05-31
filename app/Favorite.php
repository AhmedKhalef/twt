<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
        protected $guarded = [];

    public function Post()
    {
    return $this->belongsTo('App\Post');
    }
    public function User()
    {
    return $this->belongsTo(User::class);
    }
    
}

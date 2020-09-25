<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Book extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id',
    ];

    public function likes() {
        return $this->hasMany(Like::class, 'book_id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }


    public function is_liked_by_auth_user() {
        $id = Auth::id();
        $likers = array();
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }
        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}

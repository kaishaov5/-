<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //一个用户可以有多个文章
    public function articles(){
        return $this->hasMany('App\Article');
    }

    //一个用户可以有多个评论
    public function comments(){
        return $this->hasMany('App\CommentArticle');
    }

    //一个用户可以有多个帖子
    public function posts(){
        return $this->hasMany('App\Post');
    }

    //一个用户可以有多个回帖
    public function replies(){
        return $this->hasMany('App\Reply');
    }
}

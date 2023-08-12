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
        'username', 'mail', 'password','bio','images','following_id','followed_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Post()
    {
        return $this->hasMany('App\Post');
    }

    // フォロー機能の実装
    public function follows()
    {
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }
    public function follower()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }
    //フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (bool) $this->follows()->where('followed_id', $user_id)->first();
    }


}

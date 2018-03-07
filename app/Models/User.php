<?php

namespace App\Models;

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

    public $timestamps = false;

    public function articles()
    {
        return $this->hasMany('App\Models\Article');

    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');

    }

    public function userGroup()
    {
        return $this->belongsTo('App\Models\UserGroup');

    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Group;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'steam64',
        'steam_name',
        'email',
        'avatar',
        'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function threads() {
        return $this->hasMany('App\Thread');
    }

    public function replies() {
        return $this->hasMany('App\Reply', 'owner', 'id');
    }
}

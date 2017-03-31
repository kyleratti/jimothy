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
        'group',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function setUserGroup(Group $objGroup) {
        $this->group = $objGroup->id;
        $this->save();
    }

    public function getUserGroup() {
        return Group::where('id', $this->group)->limit(1)->first();
    }

    public function isUserGroup($strGroupName) {
        return $this->getUserGroup()->name == $strGroupName;
    }
}

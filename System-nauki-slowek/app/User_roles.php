<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class User_roles extends Model
{

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $hidden = [
        'users_id', 'roles_id',
    ];
    public function roles()
    {
        return $this->belongsTo('App\Roles');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'description', 
    ];
    protected $hidden = [
        'timestamps', 'id', 'hidden', 'deleted',
    ];
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_roles', 'users_id', 'roles_id');
    }
    
    
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified_at', 'remember_token', 'created_at', 'updated_at', 'checked',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id',
    ];
    
    public function roles()
    {
        return $this->belongsToMany('App\Roles', 'user_roles', 'users_id', 'roles_id');
    }
    public function sets()
    {
        return $this->hasMany('App\Sets');
    }
    public function results()
    {
        return $this->hasMany('App\Results');
    }
    public function editors()
    {
        return $this->hasMany('App\Editors', 'users_id');
    }
    public function authorizeRoles($roles)
{
  if (is_array($roles)) {
      return $this->hasAnyRole($roles) || 
             abort(401, 'This action is unauthorized.');
  }
  return $this->hasRole($roles) || 
         abort(401, 'This action is unauthorized.');
}
/**
* Check multiple roles
* @param array $roles
*/
public function hasAnyRole($roles)
{
  return null !== $this->roles()->whereIn(‘name’, $roles)->first();
}
/**
* Check one role
* @param string $role
*/
public function hasRole($role)
{
  return null !== $this->roles()->where(‘name’, $role)->first();
}
public function getId() 
{ 
    return $this->id; 
} 
}

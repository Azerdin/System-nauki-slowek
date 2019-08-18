<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Languages extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
       'name', 'symbol', 'hidden', 'deleted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];
    public function sets1()
    {
        return $this->hasMany('App\Sets', 'languages1_id');
    }
    public function sets2()
    {
        return $this->hasMany('App\Sets', 'languages2_id');
    }
    
}

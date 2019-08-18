<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Results extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'sets_id', 'users_id', 'date', 'percent',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'timestamps',
    ];
    public function sets()
    {
        return $this->belongsTo('App\Sets');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    
}

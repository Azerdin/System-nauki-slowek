<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Editors extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'users_id', 'supereditor', 'subcategories_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'timestamps',
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function subcategories()
    {
        return $this->belongsTo('App\Subcategories');
    }

    
}

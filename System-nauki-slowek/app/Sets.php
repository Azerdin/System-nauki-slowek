<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sets extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'languages1_id', 'languages2_id', 'subcategories_id', 'users_id', 'name', 'words', 'number_of_words', 'created_at', 'updated_at', 'private', 'validated', 'deleted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'id',
    ];
    public function editors()
    {
        return $this->hasMany('App\Editors');
    }
    public function results()
    {
        return $this->hasMany('App\Results');
    }
    public function languages1()
    {
        return $this->belongsTo('App\Languages', 'languages1_id');
    }
    public function languages2()
    {
        return $this->belongsTo('App\Languages', 'languages2_id');
    }
    public function subcategories()
    {
        return $this->belongsTo('App\Subcategories');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    
}

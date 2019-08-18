<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Iatstuti\Database\Support\CascadeSoftDeletes;

class Subcategories extends Model
{
    use SoftDeletes;
    //use CascadeSoftDeletes;
    //protected $cascadeDeletes = ['categories'];
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'categoria_id','name','description', 'picture_file_name', 'created_at', 'updated_at', 'hidden', 'deleted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'id',
    ];
    public function sets()
    {
        return $this->hasMany('App\Sets');
    }
    public function editors()
    {
        return $this->hasMany('App\Editors');
    }
    public function categories()
    {
        return $this->belongsTo('App\Categories');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Categories extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'description', 'picture_file_name', 'crated_at', 'updated_at', 'hidden',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];
    public function subcategories()
    {
        return $this->hasMany('App\Subcategories');
    }
    
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $fillable = [
        'category_name',
        'category_slug',
        'description'

    ];
    public function posts()
    {
        return $this->hasMany('App\Models\Admin\Post');
    }

}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_categories';
    protected $fillable = [
        'c_name',
        'c_slug',
        'c_description',
        'parent_id',

    ];
    public function category()
    {
        return $this->hasMany('App\Models\Admin\Category');
    }

}

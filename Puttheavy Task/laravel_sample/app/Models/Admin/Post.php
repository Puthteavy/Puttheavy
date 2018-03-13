<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Category');

    }
}

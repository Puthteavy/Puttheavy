<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'image',
        'content'

    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Category');

    }
}

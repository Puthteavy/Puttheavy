<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Category extends Model
{
    protected $fillable = ['category_name','description','parent_id'];
}

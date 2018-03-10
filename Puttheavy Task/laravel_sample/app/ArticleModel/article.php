<?php

namespace App\ArticleModel;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    // model article point to articles table
    protected $table = 'articles';
    protected $fillable = [
      'title',
      'body',
      'active',
    ];
    public function user(){
        // reference to table me
        return $this->belongsTo('App\User');
    }
}

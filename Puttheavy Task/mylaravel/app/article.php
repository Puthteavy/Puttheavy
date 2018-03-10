<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//model connect to database
class article extends Model
{
    //reference to table
    protected $table = 'article';
    //declare default primary key
    protected $primaryKey ='article_id';
    protected $fillable = [
      'id',
        'name',
    ];
    //create elquent scope
    public function scopeElequend($query){
        return $query->orderBy('article_id','DESC')->get();
    }

}

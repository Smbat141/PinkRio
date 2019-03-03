<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','desc','alias','text','category_id','img'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article(){
        return $this->hasMany('App\Article');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

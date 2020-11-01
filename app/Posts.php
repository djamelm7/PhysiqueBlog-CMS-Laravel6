<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Posts extends Model
{
    use SoftDeletes;

    Protected $table = "posts";

 public function user()
    {
        return $this->belongsto('app\User','user_id');
    }

    public function category(){
        return $this->belongsTo('app\Categories');
    }

    public function comments()
    {
        return $this->hasMany('app\Comments');
    } 
   
}

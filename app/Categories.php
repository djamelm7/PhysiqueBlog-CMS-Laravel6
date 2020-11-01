<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    Protected $table = "categories";

    public function posts(){
       return $this->hasMany('App\Posts');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    Protected $table = "profiles";

    public function user()
    {
      return  $this->belongsTo('app\User','user_id');
    }
 
}

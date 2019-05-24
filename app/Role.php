<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // ------------------- Relation with Role ----------------
    public function users()
    {

        return $this->hasMany('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
// ------------------- Relation with places ----------------
    public function homes()
    {
        return $this->hasMany('App\Place');
    }

}

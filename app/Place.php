<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{

// ------------------- Relation with homes ----------------
    public function homes()
    {
        return $this->hasMany('App\Home');
    }

    // ------------------- Relation with city ----------------
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}

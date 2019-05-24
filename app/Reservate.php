<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservate extends Model
{

    // ------------------- Relation with User ----------------
    public function user()
    {

        return $this->belongsTo('App\User');
    }

    // ------------------- Relation with Home ----------------
    public function home()
    {

        return $this->belongsTo('App\Home');
    }
}

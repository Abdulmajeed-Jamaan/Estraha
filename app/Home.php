<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    // ------------------- Relation with User ----------------
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // ------------------- Relation with User ----------------
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    // ------------------- Relation with Extras ----------------
    public function extras()
    {
        return $this->belongsToMany('App\Extra');
    }

    // ------------------- Relation with Reservates ----------------
    public function reservates()
    {
        return $this->hasMany('App\Reservate');
    }

    // ------------------- Relation with images ----------------
    public function images()
    {
        return $this->hasMany('App\Image');
    }

}

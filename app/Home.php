<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Home extends Model
{

    protected $fillable  = [
        'title', 'no_romes', 'no_baths', 'no_kitchen', 'area', 'default_price', 'ramadan_price', 'hajj_price', 'user_id', 'place_id'
    ];

    use SoftDeletes;
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
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{

    // ------------------- Relation with Homes ----------------
    public function homes()
    {
        return $this->belongsToMany('App\Home');
    }

}

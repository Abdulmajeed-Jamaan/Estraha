<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // ------------------- Relation with Role ----------------
    public function role()
    {

        return $this->belongsTo('App\Role');
    }

    // ------------------- Relation with Home ----------------
    public function homes()
    {
        return $this->hasMany('App\Home');
    }

    // ------------------- Relation with Reservate ----------------
    public function reservates()
    {
        return $this->hasMany('App\Reservate');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'role_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

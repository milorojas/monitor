<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'run', 'dv', 'name', 'email', 'password','laboratory_id', 'establishment_id'
    ];

    public function logs() {
        return $this->morphMany('App\Log','model');
    }

    public function vitalSigns() {
        return $this->hasMany('App\SanitaryResidence\VitalSign');
    }

    public function laboratory() {
        return $this->belongsTo('App\Laboratory');
    }

    /**
    * The residence that belong to the user.
    */
    public function residences() {
        return $this->belongsToMany('App\SanitaryResidence\Residence');
    }

    /**
    * The establishment that belong to the user.
    */
    public function establishments() {
        return $this->belongsToMany('App\Establishment');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
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

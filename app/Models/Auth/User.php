<?php

namespace App\Models\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'phone_code_1',
        'phone_code_2',
        'phone_namber',
        'phone_namber_full',
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

    /**
     * Связь с таблицей questions
     *
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Forum\Question');
    }

    /**
     * Связь с таблицей Roles
     *
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Auth\Role');
    }
}

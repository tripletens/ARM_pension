<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     // `surname`, `firstname`, `email`, `address`, `phone`, `dob`, `code`, `is_verified`
    protected $fillable = [
        'surname', 'firstname', 'email', 'address', 'phone', 'dob', 'code', 'is_verified','account_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'phone', 'email', 'password', 'address', 'logo', 'activate', 'private_qr', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

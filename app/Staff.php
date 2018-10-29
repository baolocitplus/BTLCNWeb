<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use Notifiable;
    protected $table = 'staff';
    protected $fillable = [
        'name', 'phone', 'email', 'password', 'address', 'avatar', 'company_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

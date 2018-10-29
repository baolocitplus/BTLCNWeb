<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
	    'id',
	    'user_id',
	    'booking_id',
	    'payment_method',
	    'status',
	];
}

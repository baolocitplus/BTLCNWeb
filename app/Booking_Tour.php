<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_Tour extends Model
{
    protected $fillable = [
	    'id',
	    'user_id',
	    'tour_id',
	    'pickplace',
	    'adultnumber',
	    'childnumber',
	    'timestart',
	    'totalprice',
	    'status',
	    'private_qr',
	];
}

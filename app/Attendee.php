<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = [
	    'id',
	    'name',
	    'phone',
	    'gender',
	    'timestart',
	    'tour_id',
	    'checking',
	    'booking_id',
	];
}

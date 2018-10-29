<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
	protected $table = 'schedules';
    protected $fillable = [
	    'id',
	    'tour_id',
	    'timestart',
	    'timeend',
	    'hourstart',
	    'staff_id',
	   	'adultprice',
        'childprice',
	    'private_qr',
	];

	public function staff()
    {
        return $this->beLongsto('App\Staff', 'staff_id');
    }
}

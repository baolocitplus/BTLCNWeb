<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
		protected $table = 'tours';
        protected $fillable = [
	    'id',
	    'company_id',
	    'name',
	    'vehicle',
	    'short_description',
	    'overview',
	    'policy',
	    'startlocal',
	    'endlocal',
	    'number',

	];
	public function tourImage()
    {
        return $this->hasMany(Tour_Image::class, 'tour_id');
    }

    public function tourSchedule()
    {
        return $this->hasMany(Schedule::class, 'tour_id');
    }
}

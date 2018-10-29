<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour_Image extends Model
{
    protected $table = 'tour__images';
    protected $fillable = [
	    'id',
	    'tour_id',
	    'image',
	];

	public function tourid()
     {
          return $this->belongsTo(Tour::class, 'tour_id', 'id');
     }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	protected $table = 'sensors';
	
    public function cameras()
    {
    	return $this->belongsTo('App\camera','id');
    }

}

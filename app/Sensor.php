<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	protected $table = 'Sensors';
	
    public function cameras()
    {
    	return $this->belongsToMany('App\camera','camera_id');
    }

}

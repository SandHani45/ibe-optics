<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    public function cameras()
    {
    	return $this->belongsTo('App\camera','camera_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class camera extends Model
{
    public function manufacturers(){

    	return $this->belongsTo('App\manufacturer','manufacturer_id');
    }

    public function sensors()
    {
    	return $this->hasMany('App\Sensor');
    }
}

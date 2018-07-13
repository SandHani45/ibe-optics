<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class camera extends Model
{
	protected $table = 'cameras';

    public function manufacturers(){

    	return $this->belongsToMany('App\manufacturer','manufacturer_id');
    }

    public function sensors()
    {
    	return $this->hasMany('App\Sensor');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manufacturer extends Model
{
	protected $table = 'manufacturers';

    public function categories(){

    	return $this->belongsToMany('App\categorie','categorie_id');
    }
    
    public function series()
    {
    	return $this->hasMany('App\series');
    }
      public function focalLengths()
    {
        return $this->hasMany('App\focalLength');
    }

    public function camera()
    {
        return $this->hasMany('App\camera','manufacturer_id');
    }


    public function cameras()
    {
          return $this->hasMany('App\camera','manufacturer_id');
    }
}

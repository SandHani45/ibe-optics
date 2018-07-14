<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manufacturer extends Model
{
	protected $table = 'manufacturers';

    public function categories(){

    	return $this->belongsToMany('App\categorie','categorie_id');
    }
    
    public function cameras()
    {
    	return $this->hasMany('App\camera');
    } 
    
    public function series()
    {
    	return $this->hasMany('App\series');
    }
}

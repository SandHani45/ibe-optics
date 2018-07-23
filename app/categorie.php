<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
	protected $table = 'categories';

    public function manufactures()
    {
    	return $this->hasMany('App\manufacturer','categorie_id');
    }

     public function focalLengths()
    {
    	return $this->hasMany('App\focalLength');
    } 
    public function camera()
    {
    	return $this->hasMany('App\camera','categorie_id');
    }

}

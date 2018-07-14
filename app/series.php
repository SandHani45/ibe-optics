<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class series extends Model
{
   	public function manufacturers(){

    	return $this->belongsToMany('App\manufacturer','manufacturer_id');
    }

    public function focalLength()
    {
    	return $this->hasMany('App\focalLength','categorie_id');
    }

}

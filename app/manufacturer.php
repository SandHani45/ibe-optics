<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manufacturer extends Model
{
    public function categories(){

    	return $this->belongsTo('App\categorie','categorie_id');
    }

    public function cameras()
    {
    	return $this->hasMany('App\camera');
    }
}

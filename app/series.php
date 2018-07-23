<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class series extends Model
{
  
    public function focalLengths()
    {
        return $this->hasMany('App\focalLength');
    }
    public function manufactures()
    {
    	return $this->hasMany('App\manufacturer','categorie_id');
    }  

}

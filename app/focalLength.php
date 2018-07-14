<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class focalLength extends Model
{
    public function focalLengths()
    {
    	return $this->belongsToMany('App\focalLength');
    }
}

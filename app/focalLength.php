<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class focalLength extends Model
{
    public function categories()
    {
    	return $this->belongsToMany('App\categorie','categorie_id');
    }
}

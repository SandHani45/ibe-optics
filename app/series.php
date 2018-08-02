<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class series extends Model
{
    public function focalLengths()
    {
        return $this->hasMany('App\focalLength', 'series_id', 'id');
    }

    public function manufactures()
    {
    	return $this->hasMany('App\manufacturer','categorie_id');
    }  

    public function lensManufactures()
    {
    	return $this->hasMany('App\lens_manufacturer', 'id', 'lens_manufacturer_id');
    }
}

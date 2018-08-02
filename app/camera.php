<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class camera extends Model
{
	protected $table = 'cameras';

    public function categories()
    {
        return $this->belongsTo('App\categorie','categorie_id', 'id');
    } 
    public function manufacturers()
    {
        return $this->belongsTo('App\manufacturer','manufacturer_id', 'id');
    }

    public function sensors()
    {
    	return $this->hasMany('App\Sensor','camera_id', 'id');
    }
}

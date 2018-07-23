<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class camera extends Model
{
	protected $table = 'cameras';

    public function categories()
    {
        return $this->belongsTo('App\categorie','id');
    } 
    public function manufacturers()
    {
        return $this->belongsTo('App\manufacturer','id');
    }

    public function sensors()
    {
    	return $this->hasMany('App\Sensor','camera_id');
    }

}

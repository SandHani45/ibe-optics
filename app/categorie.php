<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
	protected $table = 'categories';

    public function manufacturers()
    {
    	return $this->hasMany('App\manufacturer');
    } 
}

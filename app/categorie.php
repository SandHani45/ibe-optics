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

}

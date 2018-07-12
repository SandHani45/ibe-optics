<?php

namespace App\Http\Controllers;

use App\categorie;
use App\manufacturer;
use Illuminate\Http\Request;

class AddCatogorieController extends Controller
{
    public function addCategorie(Request $request)
    {
    	$categorie_verify = categorie::where('name', $request->c_type)
                    	  ->first();
		if(!$categorie_verify){
			$categorie = new categorie;
	    	$categorie->name = $request->c_type;
	    	$categorie->save();
	    	return $categorie;
	    } 
    }
    public function Edit(Request $request, $id)
	{
		$categorie = categorie::find($id);
		$categorie->name = $request->c_type;
		$categorie->update();
		return $categorie;
	}
	public function GetData(Request $request, $id)
	{
		$manufactures = manufacturer::with('categories')
									->where('categorie_id',$id)
									->get();
		return $manufactures;
	}
}

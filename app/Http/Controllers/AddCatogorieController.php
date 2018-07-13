<?php

namespace App\Http\Controllers;

use App\categorie;
use App\manufacturer;
use Illuminate\Http\Request;
use Alert;
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
	
		$manufactures = categorie::with('manufactures')
									->Orwhere('id',$id)
									->get();
		if( empty($manufactures)){
			$categorie = categorie::find($id);
			return $categorie;
		}
		
		return $manufactures;

	}
}

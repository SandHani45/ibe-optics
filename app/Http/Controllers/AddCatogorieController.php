<?php

namespace App\Http\Controllers;

use Alert;
use App\apiversion;
use App\categorie;
use App\manufacturer;
use Illuminate\Http\Request;
class AddCatogorieController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function addCategorie(Request $request)
    {
    
    	$categorie_verify = categorie::where('name', $request->c_type)
                    	  ->first();           
		apiversion::find(1)->increment('version');
		if(!$categorie_verify){
			$categorie = new categorie;
	    	$categorie->name = $request->c_type;
	    	$categorie->save();
	    	return $categorie;
	    } 
    }
    public function Edit(Request $request, $id) 
	{
		apiversion::find(1)->increment('version');
		$categorie = categorie::find($id);
		$categorie->name = $request->c_type;
		$categorie->update();
		return $categorie;
	}
	public function getCameraManuData(Request $request, $id)
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

	public function getData(Request $request, $id)
	{
	
		$manufactures = categorie::with('lensManufactures')
									->Orwhere('id',$id)
									->get();
		if( empty($manufactures)){
			$categorie = categorie::find($id);
			return $categorie;
		}
		return $manufactures;

	}
}

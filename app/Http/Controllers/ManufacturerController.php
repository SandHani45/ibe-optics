<?php

namespace App\Http\Controllers;

use App\camera;
use App\manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
   public function addManufacturer(Request $request)
	{
		$manufacturer = new manufacturer;
		$manufacturer->categorie_id = $request->categorie_id;
	    $manufacturer->name = $request->manufacturer;
	    $manufacturer->save();
	    return $manufacturer;
	}

	 public function Edit(Request $request, $id)
	{
		$manufacturer = manufacturer::find($id);
		$manufacturer->name = $request->manufacturer;
	    $manufacturer->update();
		return $manufacturer;
	}		
			
	public function GetData(Request $request, $id)
	{
		$camera = camera::with('manufacturers')
						->where('manufacturer_id',$id)
						->get();
		return $camera;
	} 
   
}

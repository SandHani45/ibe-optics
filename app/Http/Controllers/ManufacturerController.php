<?php

namespace App\Http\Controllers;

use App\apiversion;
use App\camera;
use App\manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function addManufacturer(Request $request)
	{
		apiversion::find(1)->increment('version');
		$manufacturer = new manufacturer;
		$manufacturer->categorie_id = $request->categorie_id;
	    $manufacturer->name = $request->manufacturer;
	    $manufacturer->save();
	    return $manufacturer;
	}

	 public function Edit(Request $request, $id)
	{
		apiversion::find(1)->increment('version');
		$manufacturer = manufacturer::find($id);
		$manufacturer->name = $request->manufacturer;
	    $manufacturer->update();
		return $manufacturer;
	}		
			
	public function GetData($id)
	{
		$camera = manufacturer::with('cameras')
						->Orwhere('id',$id)
						->get();

		if( empty($camera)){
			$manufacturer = manufacturer::find($id);
			return $manufacturer;
		}
		return $camera;
	} 
	public function GetLensData(Request $request, $id)
	{
		$series = manufacturer::with('series')
						->Orwhere('id',$id)
						->get();

		if( empty($series)){
			$manufacturer = manufacturer::find($id);
			return $manufacturer;
		}
		return $series;
	} 
   
}

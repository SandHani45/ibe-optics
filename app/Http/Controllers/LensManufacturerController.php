<?php

namespace App\Http\Controllers;

use App\apiversion;
use App\lens_manufacturer;
use Illuminate\Http\Request;

class LensManufacturerController extends Controller
{
   	public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function addLensManufacturer(Request $request)
	{
		apiversion::find(1)->increment('version');
		$manufacturer = new lens_manufacturer;
		$manufacturer->categorie_id = $request->categorie_id;
	    $manufacturer->name = $request->manufacturer;
	    $manufacturer->save();
	    return $manufacturer;
	}

	 public function editLens(Request $request, $id)
	{
		apiversion::find(1)->increment('version');
		$manufacturer = lens_manufacturer::find($id);
		$manufacturer->name = $request->manufacturer;
	    $manufacturer->update();
		return $manufacturer;
	}		
			
	public function getLensData(Request $request, $id)
	{
		$series = lens_manufacturer::with('series')
						->Orwhere('id',$id)
						->get();


		if( empty($series)){
			$manufacturer = lens_manufacturer::find($id);
			return $manufacturer;
		}
		return $series;
	} 
}

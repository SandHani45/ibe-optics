<?php

namespace App\Http\Controllers;

use App\apiversion;
use App\series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function addSeries(Request $request)
    {
   
    	apiversion::find(1)->increment('version');
    	$series = new series;
		$series->categorie_id = $request->categorie_id;
		$series->lens_manufacturer_id = $request->manufacturerId;
	    $series->name = $request->lensSeries;
	    $series->save();
	    return $series;
    }

    public function Edit(Request $request, $id)
	{
		apiversion::find(1)->increment('version');
		$series = series::find($id);
		$series->name = $request->editSeries;
	    $series->update();
	    return $series;
	}

	public function GetData(Request $request, $id)
	{
	
		$series = series::with('focalLengths') 
						->Orwhere('id',$id)
						->get();
		return $series;
	} 
}

<?php

namespace App\Http\Controllers;

use App\series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
       public function addSeries(Request $request)
    {
    	$series = new series;
		$series->categorie_id = $request->categorie_id;
		$series->manufacturer_id = $request->manufacturerId;
	    $series->name = $request->lensSeries;
	    $series->save();
	    return $series;
    }

    public function Edit(Request $request, $id)
	{
		$series = series::find($id);
		$series->name = $request->editSeries;
	    $series->update();
	    return $series;
	}

	public function GetData(Request $request, $id)
	{
		$series = series::with('focalLength')
						->Orwhere('id',$id)
						->get();

		return $series;
	} 
}

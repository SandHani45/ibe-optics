<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
   public function addSensor(Request $request)
	{
		$sensor_validate = Sensor::where('id',$request->categorie_id)
                            	->first();
        if(!$sensor_validate){
        	$sensor = new Sensor;
			$sensor->categorie_id = $request->categorie_id;
			$sensor->camera_id = $request->camera_id  ;
	    	$sensor->manufacturer_id = $request->manufacturerId;
	    	$sensor->value = $request->value;
	    	$sensor->save();
	    	return $sensor;
        }
        return $sensor_validate;

	}

	public function update(Request $request, $id)
	{
		$sensor = Sensor::find($id);
		$sensor->width = $request->width;
		$sensor->height = $request->height;
		$sensor->diameter = $request->diameter;
		$sensor->update();
		return $sensor;
	}
 
	 public function Edit(Request $request, $id)
	{
		$sensor = Sensor::find($id);
		$sensor->value = $request->value;
	    $sensor->update();
	    return $sensor;
	}

	 public function EditWidth(Request $request, $id)
	{
		$sensor = Sensor::find($id);
		$sensor->width = $request->width;
		$sensor->height = $request->height;
		$sensor->diameter = $request->diameter;
	    $sensor->update();
	    return $sensor;
	}

	public function GetData(Request $request, $id)
	{
		$sensor = Sensor::find($id);
		if( empty($sensor)){
			$sensor = Sensor::find($id);
			return $sensor;
		}
		return $sensor;
	}

	public function Review(Request $request, $id){
		$review = Sensor::with('categories')
						->get();
		return $review;							
	} 
}

<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\camera;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    public function addCamera(Request $request)
    {
    	$camera = new camera;
		$camera->categorie_id = $request->categorie_id;
		$camera->manufacturer_id = $request->manufacturerId;
	    $camera->name = $request->cameraname;
	    $camera->save();
	    return $camera;
    }

    public function Edit(Request $request, $id)
	{
		$camera = camera::find($id);
		$camera->name = $request->cameraname;
	    $camera->update();
	    return $camera;
	}

	public function GetData(Request $request, $id)
	{
		$sensor = Sensor::with('cameras')
						->where('camera_id',$id)
						->get();
		return $sensor;
	} 

}

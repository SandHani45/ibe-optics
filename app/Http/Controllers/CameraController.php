<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\apiversion;
use App\camera;
use Illuminate\Http\Request;

class CameraController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function addCamera(Request $request)
    {
    	apiversion::find(1)->increment('version');
    	$camera = new camera;
		$camera->categorie_id = $request->categorie_id;
		$camera->manufacturer_id = $request->manufacturerId;
	    $camera->name = $request->cameraname;
	    $camera->save();
	    return $camera;
    }

    public function Edit(Request $request, $id)
	{
		apiversion::find(1)->increment('version');
		$camera = camera::find($id);
		$camera->name = $request->cameraname;
	    $camera->update();
	    return $camera;
	}

	public function GetData(Request $request, $id)
	{
		$sensor = camera::with('sensors')
						->Orwhere('id',$id)
						->get();

		if( empty($sensor)){
			$camera = camera::find($id);
			return $camera;
		}
		return $sensor;
	} 

}

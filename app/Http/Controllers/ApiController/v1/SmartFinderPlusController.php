<?php

namespace App\Http\Controllers\ApiController\v1;

use App\Http\Controllers\Controller;
use App\Sensor;
use App\apiversion;
use App\camera;
use App\categorie;
use App\focalLength;
use App\lens_manufacturer;
use App\manufacturer;
use App\series;
use Illuminate\Http\Request;

class SmartFinderPlusController extends Controller
{

	public function index(){

		$catogories = categorie::all();
	   	$manufacturer = manufacturer::all();
	   	$camera = camera::all();
	   	$sensor = sensor::all();
	   	$series = series::all();
	   	$lensManufacturer = lens_manufacturer::all();
	   	$focalLength = focalLength::all();
	   	$apiVesion = apiversion::find(1);
	   	$vesion = $apiVesion->version;

	  	return response()->json([
	            'success' => true,
	            'message' => 'query is successfull',
	            'version' => $vesion,
	            'catogories' => $catogories,
	            'manufacturer' => $manufacturer,
	            'camera' => $camera,
	            'sensor' => $sensor,
	            'lensManufacturer' => $lensManufacturer,
	            'series' => $series,
	            'focalLength' => $focalLength,
	        ], 200); 
		}
   
}

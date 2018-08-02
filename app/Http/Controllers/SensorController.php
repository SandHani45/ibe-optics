<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\apiversion;
use App\camera;
use Illuminate\Http\Request;

class SensorController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function addSensor(Request $request)
	{
		apiversion::find(1)->increment('version');
		$array = array();
		$valueData =$request->value;
		$values = explode(",",$valueData);
		foreach ($values as $value) {
			$sensor = new Sensor;
			$sensor->categorie_id = $request->categorie_id;
			$sensor->camera_id = $request->camera_id  ;
	    	$sensor->manufacturer_id = $request->manufacturerId;
	    	$sensor->value = $value;
	    	$sensor->save();
	    	array_push($array, $sensor);
		}
	    return $array;
	}
		


	 public function addFocalLength(Request $request, $id){
  			$array = array();
			$focalLength =$request->focal_length;
			$focalLengths = explode(",",$focalLength);
		   	foreach ($focalLengths as $focalLength) {
				$focal = new focalLength;
				$focal->focal_length = $focalLength;
				$focal->categorie_id = $request->categorie_id;
		    	$focal->manufacturer_id = $request->manufacturerId;
		    	$focal->series_id = $request->series_id;
		    	$focal->save();
		    	array_push($array, $focal);
			}
	    	return $array;
    }

	public function update(Request $request, $id)
	{
		$array = array();
		$widthObject = $request->widthObjectList;
		$widthUpdates = json_decode($widthObject);
		foreach ($widthUpdates as  $widthUpdate) {
							
			$widthDataResult = sensor::where('id',$widthUpdate->id)
											->first();
			$widthDataResult->width = $widthUpdate->width;
			$widthDataResult->height = $widthUpdate->height;
			$widthDataResult->res_width = $widthUpdate->res_width;
			$widthDataResult->res_height = $widthUpdate->res_height;
			$widthDataResult->update();
			array_push($array, $widthDataResult);
		}
		return 	$array;	

	}
 
	 public function Edit(Request $request, $id)
	{

	    $array = array();
		$editValue = $request->value;
		$editValueDatas = json_decode($editValue);
		return $editValueDatas;
		foreach ($tshopEditValueDatas as  $tshopEditValueData) {
							
			$tshopEditValueDataResult = focalLength::where('id',$tshopEditValueData->id)
											->first();
			$tshopEditValueDataResult->focal_length_tshop_max = $tshopEditValueData->focal_length_tshop_max;
			$tshopEditValueDataResult->focal_length_tshop_min = $tshopEditValueData->focal_length_tshop_min;
			$tshopEditValueDataResult->update();
			array_push($array, $tshopEditValueDataResult);
		}

	}

	 public function editWidth(Request $request, $id)
	{
		$array = array();
		$editFianlValue = $request->editWidthResult;
		$editFianlValueDatas = json_decode($editFianlValue);
		
		foreach ($editFianlValueDatas as  $editFianlValueData) {
							
			$widthFinalDataResult = sensor::where('id',$editFianlValueData->id)
											->first();
			$widthFinalDataResult->width = $editFianlValueData->width;
			$widthFinalDataResult->height = $editFianlValueData->height;
			$widthFinalDataResult->res_width = $editFianlValueData->res_width;
			$widthFinalDataResult->res_height = $editFianlValueData->res_height;
			$widthFinalDataResult->update();
			array_push($array, $widthFinalDataResult);
		}
		return 	$array;	
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

	public function review(Request $request, $id){

		$camera_datas = camera::with('categories','manufacturers','sensors')
								->where('id', $id)
								->get();
		return $camera_datas;

	} 
}

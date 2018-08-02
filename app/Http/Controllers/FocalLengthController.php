<?php

namespace App\Http\Controllers;

use App\apiversion;
use App\focalLength;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FocalLengthController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    public function addFocalLength(Request $request, $id){
    		
    		apiversion::find(1)->increment('version');
  			$array = array();
			$focalLength =$request->focal_length;
			$focalLengths = explode(",",$focalLength);
		   	foreach ($focalLengths as $focalLength) {
				$focal = new focalLength;
				$focal->focal_length = $focalLength;
				$focal->categorie_id = $request->categorie_id;
		    	$focal->lens_manufacturer_id = $request->manufacturerId;
		    	$focal->series_id = $request->series_id;
		    	$focal->save();
		    	array_push($array, $focal);
			}
	    	return $array;
    }


    public function editFocalLength(Request $request, $id)
	{
		apiversion::find(1)->increment('version');
		$array = array();
		$focalLengthData = $request->focal_obj;
		$focalLengths =	json_decode($focalLengthData);
		foreach ($focalLengths as  $focalLength) {		
			$focalLengthResult = focalLength::where('id',$focalLength->id)
											->first();
			$focalLengthResult->focal_length =$focalLength->focal_length;
			$focalLengthResult->update();
			array_push($array, $focalLengthResult);
		}
		return 	$array;						
	}	

	public function addFocalLengthValue(Request $request, $id)
	{
		apiversion::find(1)->increment('version');
		$array = array();
		$focalLengthValueData = $request->focal_length_value;
		$focalLengthValues =	json_decode($focalLengthValueData);
		foreach ($focalLengthValues as  $focalLengthValue) {
							
			$focalLengthValueResult = focalLength::where('id',$focalLengthValue->id)
											->first();
			$focalLengthValueResult->focal_length_value =$focalLengthValue->focal_length_value;
			$focalLengthValueResult->update();
			array_push($array, $focalLengthValueResult);
		}
		return 	$array;						
	}	
	public function editFocalLengthValue(Request $request, $id)
	{
		apiversion::find(1)->increment('version');
		$array = array();
		$focalLengthValueEditData = $request->focal_length_edit_value;
		$focalLengthEditValues = json_decode($focalLengthValueEditData);
		foreach ($focalLengthEditValues as  $focalLengthEditValue) {
							
			$focalLengthValueEditResult = focalLength::where('id',$focalLengthEditValue->id)
											->first();
			$focalLengthValueEditResult->focal_length_value =$focalLengthEditValue->focal_length_value;
			$focalLengthValueEditResult->update();
			array_push($array, $focalLengthValueEditResult);
		}
		return 	$array;						
	}

	public function addTshop(Request $request, $id)
	{
		apiversion::find(1)->increment('version');
		$array = array();
		$tshopData = $request->focal_length_tshop;
		$tshopValueDatas = json_decode($tshopData);
		foreach ($tshopValueDatas as  $tshopValueData) {
							
			$tshopValueDataResult = focalLength::where('id',$tshopValueData->id)
											->first();
			$tshopValueDataResult->focal_length_tshop_max = $tshopValueData->focal_length_tshop_max;
			$tshopValueDataResult->focal_length_tshop_min = $tshopValueData->focal_length_tshop_min;
			$tshopValueDataResult->update();
			array_push($array, $tshopValueDataResult);
		}
		return 	$array;						
	}		

	public function editTshop(Request $request, $id)
	{
		apiversion::find(1)->increment('version');
		$array = array();
		$tshopEditData = $request->focal_length_edit_tshop;
		$tshopEditValueDatas = json_decode($tshopEditData);
		foreach ($tshopEditValueDatas as  $tshopEditValueData) {
							
			$tshopEditValueDataResult = focalLength::where('id',$tshopEditValueData->id)
											->first();
			$tshopEditValueDataResult->focal_length_tshop_max = $tshopEditValueData->focal_length_tshop_max;
			$tshopEditValueDataResult->focal_length_tshop_min = $tshopEditValueData->focal_length_tshop_min;
			$tshopEditValueDataResult->update();
			array_push($array, $tshopEditValueDataResult);
		}
		return 	$array;						
	}	

	public function reviewData($id)
	{
	 	$lensReviewDatas = DB::table('focal_lengths')
		                ->join('lens_manufacturers','focal_lengths.lens_manufacturer_id', '=','lens_manufacturers.id')
		                ->where('series_id', $id)
		                ->get();
		return $lensReviewDatas;            

	}			

}

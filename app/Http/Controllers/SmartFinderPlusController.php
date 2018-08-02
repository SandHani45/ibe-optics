<?php

namespace App\Http\Controllers;

use App\apiversion;
use App\camera;
use App\categorie;
use App\focalLength;
use App\manufacturer;
use App\lens_manufacturer;
use App\sensor;
use App\series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SmartFinderPlusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $camera_datas = camera::with('categories','manufacturers','sensors')->get();

        $lensdatas = series::with('focalLengths','lensManufactures')->get();
        
       	return view('pages.smartfinder-plus',compact('lensdatas','camera_datas'));
    }

    public function getTableEditData($id)
    {

        $alldatas = camera::with('categories','manufacturers','sensors')
                                            ->where('id',$id) 
                                            ->get();    
        return $alldatas;
    }

    public function getLensData()
    {
        $lensDatas = series::with('focalLengths','manufactures')->get();
        return  $lensDatas;
    }

    public function update(Request $request, $id)
    {
        apiversion::find(1)->increment('version');
        $cameraName  =  $request->camera_name;
        $manufactureName = $request->camera_manufacturer;
        $categorieName = $request->camera_categorie;

        $categorie = categorie::find($id);
        $categorie->name = $categorieName;
        $categorie->update();

        $manufacture = manufacturer::find($id);
        $manufacture->name =$manufactureName;
        $manufacture->update();

        $camera = camera::find($id);
        $camera->name = $cameraName;
        $camera->update();

        $array = array();
        $cameraEditObjects = $request->cameraEditObject;
        $cameraSensorDatas = json_decode($cameraEditObjects);
        foreach ($cameraSensorDatas as  $cameraSensorData) {
            $sensor = sensor::where('id',$cameraSensorData->id)
                            ->first();                       
            $sensor->value = $cameraSensorData->camera_value;
            $sensor->width = $cameraSensorData->camera_width;
            $sensor->height = $cameraSensorData->camera_height;
            $sensor->res_width = $cameraSensorData->camera_res_width;
            $sensor->res_height = $cameraSensorData->camera_res_height;
            $sensor->update();
            array_push($array, $sensor);  
        }
        array_push($array,$cameraName , $manufactureName ,$categorieName);
        return  $array;     
            
    }


    public function getLensTableEdit($id){
         $lensDatas = series::with('focalLengths','manufactures')
                               ->where('id',$id) 
                               ->get();
         return  $lensDatas;
    }

    public function updateLens(Request $request, $id){
        
        apiversion::find(1)->increment('version');
        $serieName  =  $request->series;
        $manufactureName = $request->manufactures;

        $series = series::find($id);
        $series->name = $serieName;
        $series->update();

        $manufacture = manufacturer::find($id);
        $manufacture->name =$manufactureName;
        $manufacture->update();

       
        $array = array();
        $lensEditObjects = $request->lenEditObjectList;
        $lensSeriesDatas = json_decode($lensEditObjects);
        foreach ($lensSeriesDatas as  $lensSeriesData) {
            $focalLength = focalLength::where('id',$lensSeriesData->id)
                                        ->first();                       
            $focalLength->focal_length = $lensSeriesData->focal_length;
            $focalLength->focal_length_value = $lensSeriesData->focal_length_value;
            $focalLength->focal_length_tshop_max = $lensSeriesData->focal_length_tshop_max;
            $focalLength->focal_length_tshop_min = $lensSeriesData->focal_length_tshop_min;
            $focalLength->update();
            array_push($array, $focalLength);  
        }
        array_push($array,$serieName, $manufactureName);
        return  $array;
    }
 
}

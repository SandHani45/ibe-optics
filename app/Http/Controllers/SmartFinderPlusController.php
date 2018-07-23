<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\camera;
use App\categorie;
use App\focalLength;
use App\manufacturer;
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
        //return $camera_datas;
        $lensdatas = series::with('focalLengths','manufactures')->get();
       	return view('pages.smartfinder-plus',compact('lensdatas','camera_datas'));
    }

    public function getTableEditData($id)
    {

        $alldatas =  $camera_datas = camera::with('categories','manufacturers','sensors')
                                            ->where('id',$id) 
                                            ->get();
               
            return $alldatas;
    }

    public function getLensData(){
         $lensDatas = series::with('focalLengths','manufactures')->get();
         return  $lensDatas;
    }

    public function update($id)
    {
        $alldatas = DB::table('Sensors')
                ->join('categories','Sensors.categorie_id', '=','categories.id')
                ->join('manufacturers','Sensors.manufacturer_id', '=','manufacturers.id')
                ->join('cameras','Sensors.camera_id', '=','cameras.id')
                ->select('categories.name as categorieName', 'manufacturers.name as manufacturerName','cameras.name as cameraName','Sensors.id','Sensors.value','Sensors.width','Sensors.height','Sensors.diameter')
                ->get();
        return  $alldatas;        
    }


    public function getLensTableEdit($id){
         $lensDatas = series::with('focalLengths','manufactures')
                               ->where('id',$id) 
                               ->get();
         return  $lensDatas;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

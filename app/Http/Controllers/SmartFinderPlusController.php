<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sensor;
use App\manufacture;
class SmartFinderPlusController extends Controller
{
   public function index()
   {
   	$alldatas = DB::table('sensors')
   				->join('categories','sensors.categorie_id', '=','categories.id')
   				->join('manufacturers','sensors.manufacturer_id', '=','manufacturers.id')
   				->join('cameras','sensors.camera_id', '=','cameras.id')
   				->select('categories.name as categorieName', 'manufacturers.name as manufacturerName','cameras.name as cameraName','sensors.id','sensors.value','sensors.width','sensors.height','sensors.diameter')
   				->get();   
   	return view('pages.smartfinder-plus',compact('alldatas'));
   }

   public function getTableEditData(Request $request, $id)
   {

        $alldatas = DB::table('sensors')
                    ->join('categories','sensors.categorie_id', '=','categories.id')
                    ->join('manufacturers','sensors.manufacturer_id', '=','manufacturers.id')
                    ->join('cameras','sensors.camera_id', '=','cameras.id')
                    ->select('categories.name as categorieName', 'manufacturers.name as manufacturerName','cameras.name as cameraName','sensors.id','sensors.value','sensors.width','sensors.height','sensors.diameter')
                    ->where('sensors.id', $id)
                    ->get();  
               
            return $alldatas;
   }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
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

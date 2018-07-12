<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\camera;
use App\categorie;
use App\manufacturer;
use Illuminate\Http\Request;

class AddCameraController extends Controller
{
    public function index(){
        $categories = categorie::all();
        $manufactures = manufacturer::all();
        $cameras = camera::all();
        $sensors = Sensor::all();
    	return view('pages.add-camera',compact('categories','manufactures','cameras','sensors'));
    }
      public function create()
    {
        //
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
        //
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

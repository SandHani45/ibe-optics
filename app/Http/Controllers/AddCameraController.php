<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\camera;
use App\categorie;
use App\manufacturer;
use Illuminate\Http\Request;

class AddCameraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $categories = categorie::all();
        $manufactures = manufacturer::all();
        $cameras = camera::all();
        $sensors = Sensor::all();
    	return view('pages.add-camera',compact('categories','manufactures','cameras','sensors'));
    }
}

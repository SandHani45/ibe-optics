<?php

namespace App\Http\Controllers;

use App\categorie;
use App\manufacturer;
use Illuminate\Http\Request;

class AddLensController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $categories = categorie::all();
        $manufactures = manufacturer::all();
        return view('pages.add-lens',compact('categories','manufactures'));
        
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmartFinderProController extends Controller
{
    public function index()
	{
	   	return view('pages.smartfinder-pro');
	}
}
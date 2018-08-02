<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function() {

  Route::get('smart-finder-plus', 'ApiController\v1\SmartFinderPlusController@index');

});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
 
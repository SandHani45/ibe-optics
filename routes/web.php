<?php

Route::get('/', function () {
     return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/smartfinder-pro', 'SmartFinderProController@index')->name('smartfinder-pro');
Route::resource('/smartfinder-plus', 'SmartFinderPlusController');
Route::post('/smartfinder-plus-update-lens/{id}', 'SmartFinderPlusController@updateLens')->name('smartfinder-plus-update-lens');
Route::get('/get-lens-smartfinder-plus', 'SmartFinderPlusController@getLensData')->name('get-lens-smartfinder-plus');;

Route::post('/smartfinder-plus-edit/{id}', 'SmartFinderPlusController@getTableEditData')->name('smartfinder-plus-edit');
Route::post('/smartfinder-plus-lens-edit/{id}', 'SmartFinderPlusController@getLensTableEdit')->name('smartfinder-plus-lens-edit.getLensTableEdit');

// ADD CAMERA ROUTES
Route::resource('/add-camera', 'AddCameraController');
Route::resource('/add-lens', 'AddLensController');
Route::post('/add-categorie', 'AddCatogorieController@addCategorie')->name('add-categorie');
Route::post('/add-categorie/{id}', 'AddCatogorieController@Edit')->name('add-categorie');
Route::post('/get-categorie/{id}', 'AddCatogorieController@getData')->name('get-categorie');
Route::post('/get-camera-categorie/{id}', 'AddCatogorieController@getCameraManuData')->name('get-camera-categorie');
//camera manufacturer
Route::post('/add-manufacturer', 'ManufacturerController@addManufacturer')->name('add-manufacturer');
Route::post('/add-manufacturer/{id}', 'ManufacturerController@Edit')->name('add-manufacturer');
Route::post('/get-manufacturer/{id}', 'ManufacturerController@GetData')->name('get-manufacturer');


Route::post('/add-camera-name', 'CameraController@addCamera')->name('add-camera-name');
Route::post('/add-camera-name/{id}', 'CameraController@Edit')->name('add-camera-name');
Route::post('/get-camera/{id}', 'CameraController@GetData')->name('get-camera');

Route::post('/add-sensor', 'SensorController@addSensor')->name('add-sensor.addSensor');
Route::post('/edit-sensor/{id}', 'SensorController@Edit')->name('edit-sensor');
Route::put('/add-sensor/{id}', 'SensorController@update')->name('add-sensor');
Route::post('/edit-sensor-value/{id}', 'SensorController@editWidth')->name('edit-sensor-value');
Route::post('/get-sensor/{id}', 'SensorController@GetData')->name('get-sensor');

Route::get('/camera-review/{id}', 'SensorController@review')->name('camera-review');

// LENS ROUTES
//lens manufacturer

Route::post('/add-lens-manufacturer', 'LensManufacturerController@addLensManufacturer')->name('add-lens-manufacturer');
Route::post('/edit-lens-manufacturer/{id}', 'LensManufacturerController@editLens')->name('edit-lens-manufacturer');
Route::post('/get-lens-manufacturer/{id}', 'LensManufacturerController@getLensData')->name('get-lens-manufacturer');

Route::post('/add-series-name', 'SeriesController@addSeries')->name('add-series-name');
Route::post('/add-series-name/{id}', 'SeriesController@Edit')->name('add-series-name');
Route::post('/get-series/{id}', 'SeriesController@GetData')->name('get-series');

Route::post('/add-focal-length/{id}', 'FocalLengthController@addFocalLength')->name('add-focal-length');
Route::put('/edit-focal-length/{id}', 'FocalLengthController@editFocalLength')->name('edit-focal-length');

Route::post('/focal-length-value/{id}', 'FocalLengthController@addFocalLengthValue')->name('focal-length-value');
Route::put('/focal-length-value/{id}', 'FocalLengthController@editFocalLengthValue')->name('focal-length-value');

Route::post('/focal-length-tshop-value/{id}', 'FocalLengthController@addTshop')->name('focal-length-tshop-value');
Route::put('/focal-length-tshop-value/{id}', 'FocalLengthController@editTshop')->name('focal-length-tshop-value');

Route::get('/lens-review/{id}', 'FocalLengthController@reviewData')->name('lens-review');


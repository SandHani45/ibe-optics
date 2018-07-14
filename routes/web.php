<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/smartfinder-pro', 'SmartFinderProController@index')->name('smartfinder-pro');
Route::resource('/smartfinder-plus', 'SmartFinderPlusController');

Route::post('/smartfinder-plus-edit/{id}', 'SmartFinderPlusController@getTableEditData')->name('smartfinder-plus-edit');
// ADD CAMERA ROUTES
Route::resource('/add-camera', 'AddCameraController');
Route::resource('/add-lens', 'AddLensController');
Route::post('/add-categorie', 'AddCatogorieController@addCategorie')->name('add-categorie');
Route::post('/add-categorie/{id}', 'AddCatogorieController@Edit')->name('add-categorie');
Route::post('/get-categorie/{id}', 'AddCatogorieController@GetData')->name('get-categorie');

Route::post('/add-manufacturer', 'ManufacturerController@addManufacturer')->name('add-manufacturer');
Route::post('/add-manufacturer/{id}', 'ManufacturerController@Edit')->name('add-manufacturer');
Route::post('/get-manufacturer/{id}', 'ManufacturerController@GetData')->name('get-manufacturer');

Route::post('/add-camera-name', 'CameraController@addCamera')->name('add-camera-name');
Route::post('/add-camera-name/{id}', 'CameraController@Edit')->name('add-camera-name');
Route::post('/get-camera/{id}', 'CameraController@GetData')->name('get-camera');

Route::post('/add-sensor', 'SensorController@addSensor')->name('add-sensor');
Route::post('/add-sensor/{id}', 'SensorController@Edit')->name('add-sensor');
Route::PUT('/add-sensor/{id}', 'SensorController@update')->name('add-sensor');
Route::post('/add-sensor-value/{id}', 'SensorController@EditWidth')->name('add-sensor-value');
Route::post('/get-sensor/{id}', 'SensorController@GetData')->name('get-sensor');

Route::post('/camera-review/{id}', 'SensorController@Review')->name('camera-review');

// LENS ROUTES
Route::post('/get-lens-manufacturer/{id}', 'ManufacturerController@GetLensData')->name('get-lens-manufacturer');

Route::post('/add-series-name', 'SeriesController@addSeries')->name('add-series-name');
Route::post('/add-series-name/{id}', 'SeriesController@Edit')->name('add-series-name');
Route::post('/get-series/{id}', 'SeriesController@GetData')->name('get-series');

// Route::post('/get-focal/{id}', 'SensorController@getFocalData')->name('get-focal');

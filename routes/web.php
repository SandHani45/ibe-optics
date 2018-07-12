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
Route::get('/smartfinder-plus', 'SmartFinderPlusController@index')->name('smartfinder-plus');
Route::resource('/add-camera', 'AddCameraController');
Route::get('/add-lens', 'AddLensController@index')->name('add-lens');

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
<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/stations', 'StationController@index');
Route::get('/stafflogin', 'PagesController@stafflogin');
Route::get('/police', 'PoliceController@index');
Route::get('/crimes', 'CrimeController@index');
Route::get('/reportcrime', 'ReportController@create');
Route::get('/reportedcrimes', 'ReportController@reportedcrimes');
Route::get('/myreports', 'ReportController@myreports');
Route::get('/policewanted', 'CriminalController@index');
Route::post('/search', 'CriminalController@search');
Route::get('/newcrime', 'CriminalController@create');
Route::post('/newcrime', 'CriminalController@store');
Route::get('/crimerecords', 'CriminalController@crimerecords');
Route::get('/wanted', 'CriminalController@wanted');
Route::get('/wanted/{criminal}', 'CriminalController@wanteddetails');

Route::post('/report', 'ReportController@store');
Route::post('/identify', 'IdentificationController@store');
Route::get('/identifiedsuspects', 'IdentificationController@index');
Route::post('/crimes', 'CrimeController@store');
Route::post('/police', 'PoliceController@store');
Route::post('/stationpost', 'StationController@store');
Route::post('/stationupdate/{station}', 'StationController@update');

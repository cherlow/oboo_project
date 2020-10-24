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

    if (auth()) {

        return redirect("/home");
    } else {
        return view('welcome');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/stations', 'StationController@index');
Route::get('/stafflogin', 'PagesController@stafflogin');
Route::get('/police', 'PoliceController@index');
Route::post('/transferpolice/{user}', 'PoliceController@transferpolice');
Route::get('/crimes', 'CrimeController@index');
Route::get('/reportcrime', 'ReportController@create');
Route::get('/reportedcrimes', 'ReportController@reportedcrimes');
Route::get('/myreports', 'ReportController@myreports');
Route::get('/stations/{station}', 'StationController@stationdetails');


Route::get('/policewanted', 'CriminalController@index');
Route::get('/changestatus/{criminal}', 'CriminalController@changestatus');
Route::get('/crimereportshow/{report}', 'CriminalController@crimereportshow');
Route::get('/admincrimereportshow/{report}', 'CriminalController@admincrimereportshow');
Route::post('/search', 'CriminalController@search');
Route::get('/newcrime', 'CriminalController@create');
Route::post('/newcrime', 'CriminalController@store');
Route::get('/crimerecords', 'CriminalController@crimerecords');
Route::get('/wanted', 'CriminalController@wanted');
Route::get('/wanted/{criminal}', 'CriminalController@wanteddetails');
Route::get('/identifiedsuspect/{identification}', 'IdentificationController@identifiedshow');
Route::get('/adminidentifiedsuspect/{identification}', 'IdentificationController@adminidentifiedshow');
Route::get('/user/reportdetails/{report}', 'ReportController@reportdetails');

Route::post('/report', 'ReportController@store');
Route::post('/identify', 'IdentificationController@store');
Route::get('/identifiedsuspects', 'IdentificationController@index');
Route::post('/crimes', 'CrimeController@store');
Route::post('/police', 'PoliceController@store');
Route::post('/stationpost', 'StationController@store');
Route::post('/stationupdate/{station}', 'StationController@update');

Route::get('/admin/users', 'HomeController@adminusers');
Route::get('/userdetails/{user}', 'HomeController@userdetails');
Route::get('/crimetype/{crime}', 'CrimeController@crimedelete');

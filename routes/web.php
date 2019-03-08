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
    return view('welcome');
});

// Route::group(['middleware' => 'auth'], function () {
//     //    Route::get('/link1', function ()    {
// //        // Uses Auth Middleware
// //    });

//     //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
//     #adminlte_routes


// });

// Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/noscriptpage', function () {
    return view('noscriptpage');
});

Route::resource('/personal', 'PersonalController');
Route::resource('/asistencia', 'AssistancesController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

	// Home page (form to set the test case)
    Route::get('/', function () {
        return view('home');
    });

    // Calculate the cube summation (optional: return page with result)
    Route::post('/summ', 'SolutionController@solve');
});

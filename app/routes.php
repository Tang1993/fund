<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('view/{name}',function($name){
	switch ($name) {
		case 'projects':
			return View::make('projects');
			break;
		case 'newProject':
			return View::make('newProject');
			break;
		case 'logreg':
			return View::make('logreg');
			break;
		default:
			break;
	}
});
Route::resource('user','UserController');
Route::post('user/login',"UserController@login");
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


/**
 * Handle default routes, and send them to the documentation
 */
Route::any('{docs}', function()
{
	return Redirect::to(Config::get('app.docs_url') . '/v1/docs');
})->where('docs', '(docs|documentation|v1|v1/docs|v1/documentation)?');

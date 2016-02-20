<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return view('index');
});
$app->get('/debug', function() use ($app) {
    return view('debug');
});
$app->get('/dashboard', function() use ($app) {
    return view('dashboard.index');
});
$app->get('/dashboard/debug', function() use ($app) {
    return view('dashboard.debug');
});
$app->group(['prefix' => 'api','namespace' => 'App\Http\Controllers\Lume\Auth','middleware' => 'CORS'], function($app)
{
    $app->post('login','LoginController@index');
    $app->get('logout','LoginController@logout');
});
$app->group(['prefix' => 'api/admin','namespace' => 'App\Http\Controllers\Lume\Admin','middleware' => 'CORS'], function($app)
{
    $app->get('users','UsersController@index');
});
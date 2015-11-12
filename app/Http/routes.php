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

Route::get('/', function () {
    return view('welcome');
});

Route::resource( 'project', 'ProjectController' );
Route::get( '/projects', [ 'as' => 'project.index', 'uses' => 'ProjectController@index' ] );

Route::resource( 'server', 'ServerController' );
Route::get( '/servers', [ 'as' => 'server.index', 'uses' => 'ServerController@index' ] );

Route::resource( 'environment', 'EnvironmentController' );
Route::get( '/environments', [ 'as' => 'environment.index', 'uses' => 'EnvironmentController@index' ] );
Route::get( '/test/{token}', 'EnvironmentController@test' );

Route::get( '/deploy/{token}', [ 'as' => 'deploy', 'uses' => 'DeployController@run' ] );

Route::get( '/history/{id}', [ 'as' => 'history', 'uses' => 'HistoryController@show' ] );

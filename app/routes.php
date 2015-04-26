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

Route::get('/', array(
	'as'	=>	'home',
	'uses'	=>	'HomeController@home'
));

Route::get('/register', array(
        'as'    =>      'register',
        'uses'  =>      'HomeController@register'
));

Route::post('/postRegister', array(
    'as' => 'postRegister',
    'uses' => 'HomeController@postRegister'
));

Route::get('/about', array('as' => 'about', 'uses' => 'HomeController@about'));
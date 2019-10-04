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


/* Unauthenticated Group */
Route::group(array('before' => 'guest'), function(){

	// Signin
	Route::post('login', array('as' => 'login', 'uses' => 'AccountController@doLogin'));
	Route::get('login', array('as' => 'login', 'uses' => 'AccountController@showLogin'));
});


/* Authenticated Group */
Route::group(array('before' => 'auth'), function(){

	// Logout
	Route::get('logout', array('as' => 'logout', 'uses' => 'AccountController@logout'));

	// Home
	Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));


	/* Admin Group */
	Route::group(array('before' => 'admin'), function(){

		// Staff
		Route::resource('staff', 'StaffController');

		// Salary Base 
		Route::resource('salary/base', 'SalaryBaseController',
						array('only' => array('index', 'store', 'update', 'destroy')));
		// Salary Sub and Add Values
		Route::post('salary/base/subandadd/value', array('as' => 'salary.base.subandadd.value.store', 'uses' => 'SalarySubAddController@store_value'));
		// Salary Base Subtract and Addition (sub and add)
		Route::resource('salary/base/subandadd', 'SalarySubAddController', 
						array('only' => array('show', 'store', 'update', 'destroy')));
		// Salary Calculation
		Route::resource('salary/calculation', 'SalaryCalculationController', 
						array('only' => array('index', 'store')));
		// Salary
		Route::resource('salary', 'SalaryController');

		// Settings > General
		Route::resource('settings/general', 'SettingController',
						array('only' => array('index', 'store')));
		Route::any('settings/general/calendar', ['as' => 'settings.general.calendar', 'uses' => 'SettingController@calendar']);
		// Settings > Users
		Route::resource('settings/users', 'UserController',
						array('only' => array('index', 'store', 'update', 'destroy')));


		Route::resource('report', 'ReportController',
						['only' => ['index', 'store']]);


	});

});



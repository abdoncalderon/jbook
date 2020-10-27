<?php

use Illuminate\Support\Facades\Route;


/* Routes Login */
Auth::routes();

/* Routes Home */
Route::get('/', 'HomeController@index')->name('home');

/* Routes Roles */
Route::resource('roles','RoleController');

/* Routes Users */
Route::resource('users','UserController');

/* Routes Profiles */
Route::resource('profiles','ProfileController');

/* Routes Contractors */
Route::resource('contractors','ContractorController');

/* Routes Equipments */
Route::resource('equipments','EquipmentController');

/* Routes Positions */
Route::resource('positions','PositionController');

/* Routes Sectors */
Route::resource('sectors','SectorController');

/* Routes Menus */
Route::resource('menus','MenuController');

/* Routes Projects */
Route::resource('projects','ProjectController');

/* Routes Locations */
Route::resource('locations','LocationController');

/* Routes Periods */
Route::resource('periods','PeriodController');

/* Routes Permits */
Route::get('/permits/{user}','PermitController@index')->name('permits.index');
Route::get('/permits/edit/{permit}','PermitController@edit')->name('permits.edit');
Route::patch('/permits/{permit}','PermitController@update')->name('permits.update');

/* Routes Locations x User */
Route::get('/locationsUsers/{user}','LocationUserController@index')->name('locationsUsers.index');
Route::get('/locationsUsers/create','LocationUserController@create')->name('locationsUsers.create');
Route::post('/locationsUsers','LocationUserController@store')->name('locationsUsers.store');
Route::get('/locationsUsers/edit/{permit}','LocationUserController@edit')->name('locationsUsers.edit');
Route::patch('/locationsUsers/{permit}','LocationUserController@update')->name('locationsUsers.update');

/* Routes Periods */
Route::resource('workbooks','WorkbookController');
Route::get('getNumber/{location}','WorkbookController@getNumber')->name('workbooks.getNumber');

/* Routes Daily Reports */
Route::get('/dailyReports','DailyReportController@index')->name('dailyReports.index');
Route::get('/dailyReports/create/{workbook}','DailyReportController@create')->name('dailyReports.create');
// Route::resource('dailyReports','DailyReportController');


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
Route::get('/contractor/destroy/{contractor}','ContractorController@destroy')->name('contractors.destroy');

/* Routes Equipments */
Route::resource('equipments','EquipmentController');
Route::get('/equipment/destroy/{equipment}','EquipmentController@destroy')->name('equipments.destroy');

/* Routes Positions */
Route::resource('positions','PositionController');
Route::get('/position/destroy/{position}','PositionController@destroy')->name('positions.destroy');

/* Routes Sectors */
Route::resource('sectors','SectorController');
Route::get('/sector/destroy/{sector}','SectorController@destroy')->name('sectors.destroy');

/* Routes Menus */
Route::resource('menus','MenuController');

/* Routes Projects */
Route::resource('projects','ProjectController');

/* Routes Locations */
Route::resource('locations','LocationController');
Route::get('/location/destroy/{location}','LocationController@destroy')->name('locations.destroy');

/* Routes Turns */
Route::resource('turns','TurnController');
Route::get('/turns/destroy/{turn}','TurnController@destroy')->name('turns.destroy');

/* Routes Folios */
Route::resource('folios','FolioController');
Route::get('getNumber/{location}','FolioController@getNumber')->name('folios.getNumber');

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

/* Routes Daily Reports */
Route::get('/dailyReports','DailyReportController@index')->name('dailyReports.index');
Route::get('/dailyReports/create/{folio}','DailyReportController@create')->name('dailyReports.create');
Route::post('/dailyReports','DailyReportController@store')->name('dailyReports.store');
Route::get('/dailyReports/show/{dailyReport}','DailyReportController@show')->name('dailyReports.show');
Route::get('/dailyReports/review/{dailyReport}','DailyReportController@review')->name('dailyReports.review');
Route::get('/dailyReports/edit/{dailyReport}','DailyReportController@edit')->name('dailyReports.edit');
Route::patch('/dailyReports/{dailyReport}','DailyReportController@update')->name('dailyReports.update');

/* Routes Equipments x Daily Reports */
Route::post('/equipmentDailyReports','EquipmentDailyReportController@store')->name('equipmentDailyReports.store');
Route::get('/equipmentDailyReports/destroy/{equipmentDailyReport}','EquipmentDailyReportController@destroy')->name('equipmentDailyReports.destroy');
Route::post('/equipmentDailyReports/clone','EquipmentDailyReportController@clone')->name('equipmentDailyReports.clone');

/* Routes Positions x Daily Reports */
Route::post('/positionDailyReports','PositionDailyReportController@store')->name('positionDailyReports.store');
Route::get('/positionDailyReports/destroy/{positionDailyReport}','PositionDailyReportController@destroy')->name('positionDailyReports.destroy');
Route::post('/positionDailyReports/clone','PositionDailyReportController@clone')->name('positionDailyReports.clone');

/* Routes Events x Daily Reports */
Route::post('/eventDailyReports','EventDailyReportController@store')->name('eventDailyReports.store');
Route::get('/eventDailyReports/destroy/{eventDailyReport}','EventDailyReportController@destroy')->name('eventDailyReports.destroy');

/* Routes Attachments x Daily Reports */
Route::post('/attachmentDailyReports','AttachmentDailyReportController@store')->name('attachmentDailyReports.store');
Route::get('/attachmentDailyReports/destroy/{attachmentDailyReport}','AttachmentDailyReportController@destroy')->name('attachmentDailyReports.destroy');

/* Routes Comments x Daily Reports */
Route::post('/commentDailyReports','CommentDailyReportController@store')->name('commentDailyReports.store');
Route::get('/commentDailyReports/destroy/{commentDailyReport}','CommentDailyReportController@destroy')->name('commentDailyReports.destroy');

/* Routes Notes */
Route::get('/notes','NoteController@index')->name('notes.index');
Route::get('/notes/create/{folio}','NoteController@create')->name('notes.create');
Route::post('/notes','NoteController@store')->name('notes.store');
Route::get('/notes/show/{note}','NoteController@show')->name('notes.show');
Route::get('/notes/edit/{note}','NoteController@edit')->name('notes.edit');
Route::patch('/notes/{note}','NoteController@update')->name('notes.update');

/* Routes Attachments x Note */
Route::post('/attachmentNotes','AttachmentNoteController@store')->name('attachmentNotes.store');
Route::get('/attachmentNotes/destroy/{attachmentNote}','AttachmentNoteController@destroy')->name('attachmentNotes.destroy');

/* Routes Comments x Note */
Route::post('/commentNotes','CommentNoteController@store')->name('commentNotes.store');
Route::get('/commentNotes/destroy/{commentNote}','CommentNoteController@destroy')->name('commentNotes.destroy');
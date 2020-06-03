<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'Api'], function() {
	Route::resource('book', 'BookController');

	/**
	 * export book route
	 */
	Route::get('export', 'ExportController@export')->name('export');
});


<?php

use App\Core\Route;

Route::get('tasks','Test/TestController@test');

Route::get('tasks/{id}','TaskController');

Route::post('tasks','TaskController');

Route::delete('tasks/{id}','TaskController');

Route::put('tasks/{id}','TaskController');


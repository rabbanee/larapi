<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Students
Route::get('students', 'StudentController@index')->name('student');
Route::get('student/{id}', 'StudentController@show');
Route::post('student', 'StudentController@store');
Route::put('student/{id}', 'StudentController@update');
Route::delete('student/{id}', 'StudentController@destroy');

// Books
Route::apiResource('books', 'API\BookController');

Route::get('status/{id}', 'UserStatusController@show');

Auth::routes();

Route::get('materi/{id}', 'MateriController@show');
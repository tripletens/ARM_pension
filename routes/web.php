<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
// });
Route::get('/','UsersController@home_page')->name('home-page');
Route::get('/register','UsersController@register')->name('register');
Route::get('/verify-user','UsersController@verify_user')->name('verify-user');
Route::post('/save','UsersController@store')->name('store-user');
Route::post('/process_verify','UsersController@process_verify_user')->name('process-verify-user');

Route::post('/process_add_employer','UsersController@process_add_employer')->name('process-add-employer');

Route::post('/process_add_nok','UsersController@process_add_nok')->name('process-add-nok');
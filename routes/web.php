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

//Route::get('/', function () { return view('/auths.login');});
Route::get('/', function () { return view('/auths.login');});


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin']], function () {
//siswa

//dosen
Route::get('/dosen', 'DosenController@index');
Route::post('/dosen/create', 'DosenController@create');
Route::get('/dosen/{id}/edit', 'DosenController@edit');
Route::post('/dosen/{id}/update', 'DosenController@update');
Route::get('/dosen/{id}/delete', 'DosenController@delete');
Route::get('/dosen/{id}/profile', 'DosenController@profile');
});
Route::group(['middleware' => ['auth','checkRole:admin,siswa,dosen']], function () {
Route::get('/dashboard', 'DashboardController@index');

});
Route::group(['middleware' => ['auth','checkRole:admin,dosen']], function () {
Route::get('/siswa', 'SiswaController@index');
Route::post('/siswa/create', 'SiswaController@create');
Route::get('/siswa/{id}/edit', 'SiswaController@edit');
Route::post('/siswa/{id}/update', 'SiswaController@update');
Route::get('/siswa/{id}/delete', 'SiswaController@delete');
Route::get('/siswa/{id}/profile', 'SiswaController@profile');
Route::post('/siswa/{id}/addnilai', 'SiswaController@addnilai');

});

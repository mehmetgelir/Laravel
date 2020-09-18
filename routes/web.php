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
//'Alternetif bu şekilde yapılacak'
Route::get('/', function () {
   return view('welcome');
});

//Route::get('/merhaba', function(){
//	return view('merhaba');
//});

//Route::get('/kayit', function () {
//   return view('users.create');
///});

//'İşlemler Genellikle bu şekilde yapılacaktır.'
Route::get('/merhaba', 'HomeController@merhaba');
Route::get('/kayit', 'HomeController@createView');
Route::post('/kaydet', 'HomeController@create');
Route::get('/kisiler', 'HomeController@indexView');
Route::get('/sil/{id}', 'HomeController@delete');
Route::get('/guncelle', 'HomeController@updateView');
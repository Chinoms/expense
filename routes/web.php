<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/expenses', 'NewexpenseController@index');
Route::get('/newcat', 'CategoryController@create')->middleware('auth');
Route::post('/savecat', 'CategoryController@store')->name('storecat');
Route::get('/listcategories', 'CategoryController@index')->name('listcategories')->middleware('auth');
Route::get('/newexpense', 'ExpenseController@create')->name('newexpense')->middleware('auth');
Route::post('/storeexpense', 'ExpenseController@store')->name('storeexpense')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

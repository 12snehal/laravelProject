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
//default
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pizza', 'App\Http\Controllers\PizzaController@index')->name('pizza.index')->middleware('auth');

Route::get('/pizza/create', 'App\Http\Controllers\PizzaController@create')->name('pizza.create');

Route::post('/pizza', 'App\Http\Controllers\PizzaController@store')->name('pizza.store');

Route::get('/pizza/{id}', 'App\Http\Controllers\PizzaController@show')->name('pizza.show')->middleware('auth');

Route::delete('/pizza/{id}', 'App\Http\Controllers\PizzaController@destroy')->name('pizza.destroy')->middleware('auth');

Route::get('/pizza/update/{id}', 'App\Http\Controllers\PizzaController@update')->name('pizza.update')->middleware('auth');

Route::post('/pizza/updateData', 'App\Http\Controllers\PizzaController@updateData')->name('pizza.updateData');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

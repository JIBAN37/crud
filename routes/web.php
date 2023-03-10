<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudcontroller;

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
//     return view('welcome');
// });
Route::get('/',[crudcontroller::class,'showdata']);
Route::get('/add-data',[crudcontroller::class,'adddata']);
Route::post('/store-data',[crudcontroller::class,'storedata']);
Route::get('/edit-data/{id}',[crudcontroller::class,'editdata']);
Route::post('/update-data/{id}',[crudcontroller::class,'updatedata']);
Route::get('/delete-data/{id}',[crudcontroller::class,'deletedata']);

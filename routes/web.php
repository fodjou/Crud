<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Usercontroller;
use App\Http\Controllers\ApiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user',[Usercontroller::class,'liste_users']);
Route::get('/ajouter',[Usercontroller::class,'ajouter_users']);
Route::post('/ajouter/traitement',[Usercontroller::class,'ajouter_users_traitement']);
Route::get('/update/{id}',[Usercontroller::class,'update_users']);
Route::post('/update/traitement', [Usercontroller::class, 'update_users_traitement']);
Route::get('/delete/{id}',[Usercontroller::class,'delete_users']);



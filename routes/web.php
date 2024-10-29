<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\MenuController;
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




Route::get('login' , function(){
    return view('Auth.login');
})->name('client.login');


Route::get('register' , function(){
    return view('Auth.register');
})->name('client.register');



Route::post('login' , [AuthController::class , 'login'])->name('login.store')->middleware('guest');
Route::post('register' , [AuthController::class , 'register'])->name('register.store')->middleware('guest');


Route::get('/', function () {
    return view('Dashboard.index');
})->name('dashboard')->middleware('authenticated');

Route::group(['prefix'=>'resturants'] , function(){
    Route::get('index' , [ResturantController::class , 'index'])->name('resturants.index');
    Route::get('create' , [ResturantController::class , 'create'])->name('resturants.create');
    Route::post('store' , [ResturantController::class , 'store'])->name('resturants.store');
    Route::get('edit/{id}' , [ResturantController::class , 'edit'])->name('resturants.edit');
    Route::post('update' , [ResturantController::class , 'update'])->name('resturants.update');
    Route::get('delete/{id}' , [ResturantController::class , 'delete'])->name('resturants.delete');
    Route::get('map' , [ResturantController::class , 'map'])->name('resturants.map');

})->middleware('authenticated');


Route::group(['prefix'=>'menus'] , function(){
    Route::get('index/{id}' , [MenuController::class , 'index'])->name('menus.index');
    Route::get('create' , [MenuController::class , 'create'])->name('menus.create');
    Route::post('store' , [MenuController::class , 'store'])->name('menus.store');
    Route::get('edit/{id}' , [MenuController::class , 'edit'])->name('menus.edit');
    Route::post('update' , [MenuController::class , 'update'])->name('menus.update');
    Route::get('delete/{id}' , [MenuController::class , 'delete'])->name('menus.delete');
})->middleware('authenticated');
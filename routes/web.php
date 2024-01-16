<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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

Route::get('/',[App\Http\Controllers\Auth\LoginController::class,'showLoginForm']);



Route::post('/auth/logear',[App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('/home', function () {
 return view('home');
})->middleware('auth:web');

Route::resource('partes',  App\Http\Controllers\parteController::class);

Route::get('/report',[App\Http\Controllers\ReportPartesController::class,'generarinforme'])->name('report');




Route::resource('users',  App\Http\Controllers\UserController::class)->middleware('auth:web');
Route::resource('roles',  App\Http\Controllers\RolesController::class)->middleware('auth:web');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'Logout'])->name('logout')->middleware('auth');
//Route::get('/generarparte', [App\Http\Controllers\parteController::class, 'pdf'])->name('pdf');

Route::get('/gestorParte', function () {
    return view('gestorParte');
})->name('gestorParte');

Route::get('generarparte', [App\Http\Controllers\parteController::class, 'generarparte'])->name('generarparte')->middleware('auth');
Route::get('pdf', [App\Http\Controllers\parteController::class, 'pdf'])->name('pdf')->middleware('auth');

//Route::get('/generarparte', function (){
//    return view('parte.generarparte');
//})->name('generarparte');




Route::resource('elementoParte', 'ElementosController');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//URL::forceScheme('https');

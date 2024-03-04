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

//generarinforme
Route::post('/report',[App\Http\Controllers\ReportPartesController::class,'generarinforme'])->name('report');

Route::resource('partes',  App\Http\Controllers\parteController::class);

//Route::get('/report',[App\Http\Controllers\ReportPartesController::class,'generarinforme'])->name('report');
Route::post('/totalchecks',[App\Http\Controllers\ReportPartesController::class,'validarchecks'])->name('totalchecks');
Route::resource('informecorrectivos', App\Http\Controllers\informecorrectivoController::class);
Route::resource('listaPrecios', App\Http\Controllers\listaPreciosController::class);

Route::resource('portada', App\Http\Controllers\portadaController::class);


Route::resource('users',  App\Http\Controllers\UserController::class)->middleware('auth:web');
Route::resource('roles',  App\Http\Controllers\RolesController::class)->middleware('auth:web');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'Logout'])->name('logout')->middleware('auth');
//Route::get('/generarparte', [App\Http\Controllers\parteController::class, 'pdf'])->name('pdf');

//Controlador de Penalidades//
Route::resource('penalidades', App\Http\Controllers\PenalidadesController::class);

// Mudulo Contenedor de los 15 tipos de penalidades//
Route::get('/penalidades/panel/modulos', function () {
    return view('penalidades.panel');
})->name('penalidades.panel.modulos');

//Formulario contenedor de la Penalizacion No.1

//Formulario contenedor de la Penalizacion No.2
Route::get('/penalidades/modulospenalizacion/modulospenalizacion2', function () {
    return view('penalidades.modulospenalizacion2');
})->name('penalidades.modulospenalizacion.modulospenalizacion2');

//Formulario contenedor de la Penalizacion No.3
Route::get('/penalidades/modulospenalizacion/modulospenalizacion3', function () {
    return view('penalidades.modulospenalizacion3');
})->name('penalidades.modulospenalizacion.modulospenalizacion3');

//Formulario contenedor de la Penalizacion No.4
Route::get('/penalidades/modulospenalizacion/modulospenalizacion', function () {
    return view('penalidades.modulospenalizacion');
})->name('penalidades.modulospenalizacion.modulospenalizacion');


Route::post('/regpenalizacion4',[App\Http\Controllers\PenalidadesController::class,'store'])->name('regpenalizacion4');

//Controlador de Penalidades//



Route::get('/gestorParte', function () {
    return view('gestorParte');
})->name('gestorParte');

Route::get('/gestorInventario', function () {
    return view('gestorInventario');
})->name('gestorInventario');

Route::get('/configPortada', function () {
    return view('configPortada');
})->name('configPortada');

Route::post('/regportada',[App\Http\Controllers\portadaController::class,'store'])->name('regportada');

Route::get('generarparte', [App\Http\Controllers\ParteController::class, 'generarparte'])->name('generarparte')->middleware('auth');
Route::get('pdf', [App\Http\Controllers\ParteController::class, 'pdf'])->name('pdf')->middleware('auth');


//Route::get('/generarparte', function (){
//    return view('parte.generarparte');
//})->name('generarparte');

//Route::post('/ReportPartesController')->name('informeParte');



Route::resource('elementoParte', 'ElementosController');
Route::get('/cancelar/{parteId}', [App\Http\Controllers\ParteController::class, 'eliminarParteConRelaciones']);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//URL::forceScheme('https');

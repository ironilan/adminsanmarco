<?php


use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\frontend\EditorialController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LibroController;
use App\Http\Controllers\frontend\MailController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\ServiceController;
use Illuminate\Support\Facades\Artisan;
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



Route::get('/', [HomeController::class, 'index'])->name('inicio');



Route::get('nosotros', [HomeController::class, 'nosotros'])->name('nosotros');
Route::get('nacional', [HomeController::class, 'nacional'])->name('nacional');
Route::get('internacional', [HomeController::class, 'internacional'])->name('internacional');
Route::get('destino/{destino}', [HomeController::class, 'destino'])->name('destino.show');
Route::get('contacto', [HomeController::class, 'contacto'])->name('contacto');
Route::get('terminos', [HomeController::class, 'terminos'])->name('terminos');
Route::get('politicas', [HomeController::class, 'politicas'])->name('politicas');


Route::get('destinos', [HomeController::class, 'destinos'])->name('destinos');
Route::get('descargar', [HomeController::class, 'descargar'])->name('descargar');

Route::get('contacto', [HomeController::class, 'contacto'])->name('contacto');

Route::post('destino_send', [HomeController::class, 'destino_send'])->name('destino_send.post');
Route::post('contacto_send', [HomeController::class, 'contacto_send'])->name('contacto.post');


Route::get('config_cache', function(){
	Artisan::call('config:cache');
	return 'cache limpia...';
});

Route::get('config_clear', function(){
	Artisan::call('config:clear');
	return 'cache limpia...';
});

Route::get('view_clear', function(){
	Artisan::call('view:clear');
	return 'cache limpia...';
});


Route::get('storage_link', function(){
	Artisan::call('storage:link');
	return 'storage linkeado...';
});


Route::get('system/{type}/{key}', [HomeController::class, 'system'])->name('system');







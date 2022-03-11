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


Route::get('admin/cargar', [AdminController::class, 'cargar'])->name('cargar');
Route::post('admin/cargar/categorias', [AdminController::class, 'import_categorias'])->name('admin.import.categorias');
Route::post('admin/cargar/subcategorias', [AdminController::class, 'import_subcategorias'])->name('admin.import.subcategorias');
Route::post('admin/cargar/productos', [AdminController::class, 'import_productos'])->name('admin.import.productos');







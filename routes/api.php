<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ConfigController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\NosotrosController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\ServicioController;
use App\Http\Controllers\Api\SubcategoriaController;
use App\Http\Controllers\Api\VendedorController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\WhatsappController;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'sanmarco'], function(){
    
});

Route::get('videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('vendedores', [VendedorController::class, 'index'])->name('vendedores.index');

Route::get('marcas', [MarcaController::class, 'index'])->name('marcas.index');
Route::get('marcas/{slug}', [MarcaController::class, 'productos'])->name('marcas.show');

Route::get('servicios', [ServicioController::class, 'index'])->name('index');
Route::get('servicios/{slug}', [ServicioController::class, 'servicio'])->name('servicios.show');

Route::get('banners', [BannerController::class, 'index'])->name('index');
Route::get('bannerinternas', [BannerController::class, 'bannerinterna'])->name('bannerinterna');

Route::get('productos_home', [ProductoController::class, 'masVendidosNuevosLLegados'])->name('productos.home');

Route::get('productos', [ProductoController::class, 'index'])->name('index');
Route::get('productos/{slug}', [ProductoController::class, 'producto'])->name('productos.show');


Route::get('categorias/{slug}', [CategoriaController::class, 'listaSubcategorias'])->name('categorias.show');
Route::get('subcategorias/{slug}', [SubcategoriaController::class, 'listaProductos'])->name('subcategorias.show');

Route::get('posts/{pagina}', [PostController::class, 'index'])->name('index');
Route::get('posts_recientes', [PostController::class, 'posts_recientes'])->name('posts_recientes');
Route::get('post/{slug}', [PostController::class, 'post'])->name('posts.show');

Route::get('whatsapp', [WhatsappController::class, 'whatsapp'])->name('whatsapp');
Route::get('nosotros', [NosotrosController::class, 'nosotros'])->name('nosotros');
Route::get('config', [ConfigController::class, 'config'])->name('config');
Route::get('buscar_productos', [ProductoController::class, 'buscar_productos'])->name('buscar_productos');

Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias');


//servicios san marco
Route::get('servicios_sanmarco', [ServicioController::class, 'servicios_sm'])->name('servicios_sm');

//endpoint exclusivos para eccopac
Route::get('categoriasProductos/{id}', [CategoriaController::class, 'categoriasProductos'])->name('categoriasProductos');




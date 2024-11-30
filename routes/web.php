<?php

use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PerfilUserController;
use App\Http\Controllers\ProductosUserController;
use App\Http\Controllers\CarritoProductosController;
use Illuminate\Support\Facades\Route;

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

/* Home */
Route::get('/',[HomeController::class,'index'])->name('home.index');

/* Log-in - Log-out */ 
Route::get('/log-in',[LoginController::class,'index'])->name('login.index');
Route::post('/validar',[LoginController::class,'show'])->name('login.show');
Route::get('/log-out',[LoginController::class,'logout'])->name('logout.logout');

/* Registro */
Route::get('/registro',[RegistroController::class,'index'])->name('registro.index');

/* Usuarios */ 
Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
Route::post('/usuarios/store', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::post('/usuarios/{id_usuario}/update',[UsuariosController::class,'update'])->name('usuarios.update');
Route::post('/usuarios/destroy', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');

/* Perfil */
Route::get('/perfil',[PerfilUserController::class,'index'])->name('perfil.index');
Route::get('/mis-productos',[ProductosUserController::class,'index'])->name('productos-user.index');
Route::get('/dashboard',[DashboardUserController::class,'index'])->name('dashboard.index');

/* Productos User */
Route::post('/productos-user/update',[ProductosUserController::class,'update'])->name('productos-user.update');
Route::post('/productos-user/store', [ProductosUserController::class, 'store'])->name('productos-user.store');
Route::get('/productos-user/imagen/{id_producto}', [ProductosUserController::class, 'image'])->name('productos-user.image');

/*Productos */ 
Route::get('/productos',[ProductosController::class,'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductosController::class, 'show'])->name('productos.show');
Route::post('/productos/destroy', [ProductosController::class, 'destroy'])->name('productos.destroy');

/*CARRITO*/
Route::middleware('auth')->group(function () {
    // Ruta para ver el carrito
    Route::get('/carrito', [CarritoProductosController::class, 'index'])->name('carrito.ver');

    // Ruta para agregar productos al carrito
    Route::post('/agregar-al-carrito', [CarritoProductosController::class, 'store'])->name('carrito.agregar');

    // Ruta para actualizar la cantidad de un producto en el carrito
    Route::post('/actualizar-carrito/{id}', [CarritoProductosController::class, 'update'])->name('carrito.actualizar');

    // Ruta para eliminar un producto del carrito
    Route::post('/eliminar-carrito/{id}', [CarritoProductosController::class, 'destroy'])->name('carrito.eliminar');

    // Ruta para vaciar el carrito
    Route::post('/vaciar-carrito', [CarritoProductosController::class, 'vaciarCarrito'])->name('carrito.vaciar');

    // Flujo de compra en 3 pasos:
    // Paso 1: Continuar desde el carrito a la entrega
    Route::get('/continuar-compra', [CarritoProductosController::class, 'mostrarPasoCarrito'])->name('continuar.compra');

    // Paso 2: Mostrar opciones de entrega
    Route::post('/continuar-entrega', [CarritoProductosController::class, 'mostrarPasoEntrega'])->name('continuar.entrega');

    // Paso 3: Confirmar datos de entrega y continuar al pago
    Route::post('/continuar-pago', [CarritoProductosController::class, 'mostrarPasoPago'])->name('continuar.pago');

    // Ruta para procesar la compra
    Route::post('/procesar-compra', [CarritoProductosController::class, 'procesarCompra'])->name('carrito.procesar');
});


/* Inventario */
Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');

/* Dashboards */


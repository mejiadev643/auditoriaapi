<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MntClienteController;
use App\Http\Controllers\CtlInstitucionController;

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
Route::group(["prefix"=>"mntcliente"],function(){
    Route::get("/index",[MntClienteController::class,"index"]);
    Route::post("/store",[MntClienteController::class,"store"]);
    Route::put("/update{mnt_cliente}",[MntClienteController::class,"update"]);
    Route::delete("/destroy{mnt_cliente}",[MntClienteController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_bitacora"],function(){
    Route::get("/index",[MntBitacoraController::class,"index"]);
    Route::post("/store",[MntBitacoraController::class,"store"]);
    Route::put("/update{mnt_bitacora}",[MntBitacoraController::class,"update"]);
    Route::delete("/destroy{mnt_bitacora}",[MntBitacoraController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_cliente_key"],function(){
    Route::get("/index",[MntClienteKeyController::class,"index"]);
    Route::post("/store",[MntClienteKeyController::class,"store"]);
    Route::put("/update{mnt_cliente_key}",[MntClienteKeyController::class,"update"]);
    Route::delete("/destroy{mnt_cliente_key}",[MntClienteKeyController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_json_cliente"],function(){
    Route::get("/index",[MntJsonClienteController::class,"index"]);
    Route::post("/store",[MntJsonClienteController::class,"store"]);
    Route::put("/update{mnt_json_cliente}",[MntJsonClienteController::class,"update"]);
    Route::delete("/destroy{mnt_json_cliente}",[MntJsonClienteController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_json_cliente_permisos"],function(){
    Route::get("/index",[MntJsonClientePermisoController::class,"index"]);
    Route::post("/store",[MntJsonClientePermisoController::class,"store"]);
    Route::put("/update{mnt_permiso}",[MntJsonClientePermisoController::class,"update"]);
    Route::delete("/destroy{mnt_permiso}",[MntJsonClientePermisoController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_sistema"],function(){
    Route::get("/index",[MntSistemaController::class,"index"]);
    Route::post("/store",[MntSistemaController::class,"store"]);
    Route::put("/update{mnt_sistema}",[MntSistemaController::class,"update"]);
    Route::delete("/destroy{mnt_sistema}",[MntSistemaController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_tipo_bitacora"],function(){
    Route::get("/index",[CtlTipoBitacoraController::class,"index"]);
    Route::post("/store",[CtlTipoBitacoraController::class,"store"]);
    Route::put("/update/{mnt_tipo_bitacora}",[CtlTipoBitacoraController::class,"update"]);
    Route::delete("/destroy/{mnt_tipo_bitacora}",[CtlTipoBitacoraController::class,"destroy"]);
});

Route::group(["prefix"=>"ctl_institucion"],function(){
    Route::get("/index",[CtlInstitucionController::class,"index"]);
    Route::post("/store",[CtlInstitucionController::class,"store"]);
    Route::post("/update/{id}",[CtlInstitucionController::class,"update"])->name('update');
    Route::delete("/destroy/{id}",[CtlInstitucionController::class,"destroy"]);
});


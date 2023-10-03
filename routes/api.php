<?php

use App\Http\Controllers\CtlInstitucionController;
use App\Http\Controllers\CtlTipoBitacoraController;
use App\Http\Controllers\MntBitacoraController;
use App\Http\Controllers\MntClienteController;
use App\Http\Controllers\MntClienteKeyController;
use App\Http\Controllers\MntJsonClienteController;
use App\Http\Controllers\MntJsonClientePermisoController;
use App\Http\Controllers\MntSistemaController;
use App\Models\mnt_cliente_key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(["prefix"=>"mnt_cliente"],function(){
    Route::get("/index",[MntClienteController::class,"index"]);
    Route::post("/store",[MntClienteController::class,"store"]);
    Route::post("update/{id}",[MntClienteController::class,"update"]);
    Route::get("destroy/{id}",[MntClienteController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_bitacora"],function(){
    Route::get("/index",[MntBitacoraController::class,"index"]);
    Route::post("/store",[MntBitacoraController::class,"store"]);
    Route::post("/update/{id}",[MntBitacoraController::class,"update"]);
    Route::get("/destroy/{id}",[MntBitacoraController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_cliente_key"],function(){
    Route::get("/index",[MntClienteKeyController::class,"index"]);
    Route::post("/store",[MntClienteKeyController::class,"store"]);
    Route::post("/update/{id}",[MntClienteKeyController::class,"update"]);
    Route::get("/destroy/{id}",[MntClienteKeyController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_json_cliente"],function(){
    Route::get("/index",[MntJsonClienteController::class,"index"]);
    Route::post("/store",[MntJsonClienteController::class,"store"]);
    Route::post("/update/{id}",[MntJsonClienteController::class,"update"]);
    Route::get("/destroy/{id}",[MntJsonClienteController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_json_cliente_permisos"],function(){
    Route::get("/index",[MntJsonClientePermisoController::class,"index"]);
    Route::post("/store",[MntJsonClientePermisoController::class,"store"]);
    Route::post("/update/{id}",[MntJsonClientePermisoController::class,"update"]);
    Route::get("/destroy/{id}",[MntJsonClientePermisoController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_sistema"],function(){
    Route::get("/index",[MntSistemaController::class,"index"]);
    Route::post("/store",[MntSistemaController::class,"store"]);
    Route::post("/update/{id}",[MntSistemaController::class,"update"]);
    Route::get("/destroy/{id}",[MntSistemaController::class,"destroy"]);
});

Route::group(["prefix"=>"mnt_tipo_bitacora"],function(){
    Route::get("/index",[CtlTipoBitacoraController::class,"index"]);
    Route::post("/store",[CtlTipoBitacoraController::class,"store"]);
    Route::post("/update/{id}",[CtlTipoBitacoraController::class,"update"]);
    Route::get("/destroy/{id}",[CtlTipoBitacoraController::class,"destroy"]);
});

Route::group(["prefix"=>"ctl_institucion"],function(){
    Route::get("/index",[CtlInstitucionController::class,"index"]);
    Route::post("/store",[CtlInstitucionController::class,"store"]);
    Route::post("/update/{id}",[CtlInstitucionController::class,"update"]);
    Route::get("/destroy/{id}",[CtlInstitucionController::class,"destroy"]);
});

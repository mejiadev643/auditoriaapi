<?php

use App\Http\Controllers\CtlInstitucionController;
use App\Http\Controllers\CtlTipoBitacoraController;
use App\Http\Controllers\MntBitacoraController;
use App\Http\Controllers\MntClienteController;
use App\Http\Controllers\MntClienteKeyController;
use App\Http\Controllers\MntJsonClienteController;
use App\Http\Controllers\MntJsonClientePermisoController;
use App\Http\Controllers\MntSistemaController;
use App\Http\Controllers\SanctumController;
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

Route::post('/gntToken',[SanctumController::class,'generateToken']);
// "1|S6jiWiVIbZ31RdoNSNLHDkX5WIHV4bsUV7F2ShOu4b3c9f77"
// "token": "2|Lf8RmKTtnG11ZA1DP9TszqpwsDtZJzSNvzyKT6eIb91d3bb9"
Route::post('/login',[SanctumController::class,'createSession']);

Route::get('/logout',[SanctumController::class,'logout']);

Route::get('/login',function(){
    return "usuario no autenticado";
})->name('login');





Route::prefix('/institucion')->group(function () {
    Route::middleware('auth:sanctum')->get("/show",[CtlInstitucionController::class,"index"])->name("institucion.show");
    Route::middleware('auth:sanctum')->post("/store",[CtlInstitucionController::class,"store"])->name("institucion.store");
    Route::middleware('auth:sanctum')->get("/show/{id}",[CtlInstitucionController::class,"show"])->name("institucion.edit");
    Route::middleware('auth:sanctum')->post("/update/{id}",[CtlInstitucionController::class,"update"])->name("institucion.update");
    Route::middleware('auth:sanctum')->get("/delete/{id}",[CtlInstitucionController::class,"destroy"])->name("institucion.delete");
});

Route::prefix('/cliente')->group(function () {
    Route::middleware('auth:sanctum')->get("/show",[MntClienteController::class,"index"])->name("cliente.show");
    Route::middleware('auth:sanctum')->post("/store",[MntClienteController::class,"store"])->name("cliente.store");
    Route::middleware('auth:sanctum')->get("/show/{id}",[MntClienteController::class,"show"])->name("cliente.edit");
    Route::middleware('auth:sanctum')->post("/update/{id}",[MntClienteController::class,"update"])->name("cliente.update");
    Route::middleware('auth:sanctum')->get("/delete/{id}",[MntClienteController::class,"destroy"])->name("cliente.delete");
});

Route::prefix('/sistema')->group(function () {
    Route::middleware('auth:sanctum')->get("/show",[MntSistemaController::class,"index"])->name("sistema.show");
    Route::middleware('auth:sanctum')->post("/store",[MntSistemaController::class,"store"])->name("sistema.store");
    Route::middleware('auth:sanctum')->get("/show/{id}",[MntSistemaController::class,"show"])->name("sistema.edit");
    Route::middleware('auth:sanctum')->post("/update/{id}",[MntSistemaController::class,"update"])->name("sistema.update");
    Route::middleware('auth:sanctum')->get("/delete/{id}",[MntSistemaController::class,"destroy"])->name("sistema.delete");
});

Route::prefix('/tipobitacora')->group(function () {
    Route::middleware('auth:sanctum')->get("/show",[CtlTipoBitacoraController::class,"index"])->name("tipobitacora.show");
    Route::middleware('auth:sanctum')->post("/store",[CtlTipoBitacoraController::class,"store"])->name("tipobitacora.store");
    Route::middleware('auth:sanctum')->get("/show/{id}",[CtlTipoBitacoraController::class,"show"])->name("tipobitacora.edit");
    Route::middleware('auth:sanctum')->post("/update/{id}",[CtlTipoBitacoraController::class,"update"])->name("tipobitacora.update");
    Route::middleware('auth:sanctum')->get("/delete/{id}",[CtlTipoBitacoraController::class,"destroy"])->name("tipobitacora.delete");
});

Route::prefix('/jsoncliente')->group(function () {
    Route::middleware('auth:sanctum')->get("/show",[MntJsonClienteController::class,"index"])->name("jsoncliente.show");
    Route::middleware('auth:sanctum')->post("/store",[MntJsonClienteController::class,"store"])->name("jsoncliente.store");
    Route::middleware('auth:sanctum')->get("/show/{id}",[MntJsonClienteController::class,"show"])->name("jsoncliente.edit");
    Route::middleware('auth:sanctum')->post("/update/{id}",[MntJsonClienteController::class,"update"])->name("jsoncliente.update");
    Route::middleware('auth:sanctum')->get("/delete/{id}",[MntJsonClienteController::class,"destroy"])->name("jsoncliente.delete");
});

Route::prefix('/permisoscliente')->group(function () {
    Route::middleware('auth:sanctum')->get("/show",[MntJsonClientePermisoController::class,"index"])->name("clientepermiso.show");
    Route::middleware('auth:sanctum')->post("/store",[MntJsonClientePermisoController::class,"store"])->name("clientepermiso.store");
    Route::middleware('auth:sanctum')->get("/show/{id}",[MntJsonClientePermisoController::class,"show"])->name("clientepermiso.edit");
    Route::middleware('auth:sanctum')->post("/update/{id}",[MntJsonClientePermisoController::class,"update"])->name("clientepermiso.update");
    Route::middleware('auth:sanctum')->get("/delete/{id}",[MntJsonClientePermisoController::class,"destroy"])->name("clientepermiso.delete");
});

Route::prefix('/clientekey')->group(function () {
    Route::middleware('auth:sanctum')->get("/show",[MntClienteKeyController::class,"index"])->name("clientekey.show");
    Route::middleware('auth:sanctum')->post("/store",[MntClienteKeyController::class,"store"])->name("clientekey.store");
    Route::middleware('auth:sanctum')->get("/show/{id}",[MntClienteKeyController::class,"show"])->name("clientekey.edit");
    Route::middleware('auth:sanctum')->post("/update/{id}",[MntClienteKeyController::class,"update"])->name("clientekey.update");
    Route::middleware('auth:sanctum')->get("/delete/{id}",[MntClienteKeyController::class,"destroy"])->name("clientekey.delete");
});

Route::prefix('/bitacora')->group(function () {
    Route::middleware('auth:sanctum')->get("/show",[MntBitacoraController::class,"index"])->name("bitacora.show");
    Route::middleware('auth:sanctum')->post("/store",[MntBitacoraController::class,"store"])->name("bitacora.store");
    Route::middleware('auth:sanctum')->get("/show/{id}",[MntBitacoraController::class,"show"])->name("bitacora.edit");
    Route::middleware('auth:sanctum')->post("/update/{id}",[MntBitacoraController::class,"update"])->name("bitacora.update");
    Route::middleware('auth:sanctum')->get("/delete/{id}",[MntBitacoraController::class,"destroy"])->name("bitacora.delete");
});

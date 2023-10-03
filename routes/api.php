<?php

use App\Http\Controllers\CtlInstitucionController;
use App\Http\Controllers\CtlTipoBitacoraController;
use App\Http\Controllers\MntClienteController;
use App\Http\Controllers\MntJsonClienteController;
use App\Http\Controllers\MntSistemaController;
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



Route::prefix('/institucion')->group(function () {
    Route::get("/show",[CtlInstitucionController::class,"index"])->name("institucion.show");
    Route::post("/store",[CtlInstitucionController::class,"store"])->name("institucion.store");
    Route::get("/show/{id}",[CtlInstitucionController::class,"show"])->name("institucion.edit");
    Route::post("/update/{id}",[CtlInstitucionController::class,"update"])->name("institucion.update");
    Route::get("/delete/{id}",[CtlInstitucionController::class,"destroy"])->name("institucion.delete");
});
Route::prefix('/cliente')->group(function () {
    Route::get("/show",[MntClienteController::class,"index"])->name("cliente.show");
    Route::post("/store",[MntClienteController::class,"store"])->name("cliente.store");
    Route::get("/show/{id}",[MntClienteController::class,"show"])->name("cliente.edit");
    Route::post("/update/{id}",[MntClienteController::class,"update"])->name("cliente.update");
    Route::get("/delete/{id}",[MntClienteController::class,"destroy"])->name("cliente.delete");
});

Route::prefix('/sistema')->group(function () {
    Route::get("/show",[MntSistemaController::class,"index"])->name("sistema.show");
    Route::post("/store",[MntSistemaController::class,"store"])->name("sistema.store");
    Route::get("/show/{id}",[MntSistemaController::class,"show"])->name("sistema.edit");
    Route::post("/update/{id}",[MntSistemaController::class,"update"])->name("sistema.update");
    Route::get("/delete/{id}",[MntSistemaController::class,"destroy"])->name("sistema.delete");
});

Route::prefix('/tipobitacora')->group(function () {
    Route::get("/show",[CtlTipoBitacoraController::class,"index"])->name("tipobitacora.show");
    Route::post("/store",[CtlTipoBitacoraController::class,"store"])->name("tipobitacora.store");
    Route::get("/show/{id}",[CtlTipoBitacoraController::class,"show"])->name("tipobitacora.edit");
    Route::post("/update/{id}",[CtlTipoBitacoraController::class,"update"])->name("tipobitacora.update");
    Route::get("/delete/{id}",[CtlTipoBitacoraController::class,"destroy"])->name("tipobitacora.delete");
});

Route::prefix('/jsoncliente')->group(function () {
    Route::get("/show",[MntJsonClienteController::class,"index"])->name("jsoncliente.show");
    Route::post("/store",[MntJsonClienteController::class,"store"])->name("jsoncliente.store");
    Route::get("/show/{id}",[MntJsonClienteController::class,"show"])->name("jsoncliente.edit");
    Route::post("/update/{id}",[MntJsonClienteController::class,"update"])->name("jsoncliente.update");
    Route::get("/delete/{id}",[MntJsonClienteController::class,"destroy"])->name("jsoncliente.delete");
});

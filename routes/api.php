<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\TercerosController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'attemptLogin']);
Route::post('departments', [ResourcesController::class, 'getDepartments']);
Route::post('cities', [ResourcesController::class, 'getCities']);

Route::group(["prefix" => "orders", "middleware" => "auth:api"], function () {
    Route::get('list', [PedidosController::class, 'getOrders']);
    Route::get('products', [PedidosController::class, 'getProducts']);
    Route::post('detail', [PedidosController::class, 'getOrdersDetail']);
    Route::post("delete", [PedidosController::class, 'destroy']);
    Route::post("createOrUpdate", [PedidosController::class, 'createOrUpdateOrder']);
});

Route::group(["prefix" => "user", "middleware" => "auth:api"], function () {
    Route::get('list', [TercerosController::class, 'getTerceros']);
    Route::post('detail', [TercerosController::class, 'getTercerosDetail']);
    Route::post("delete", [TercerosController::class, 'destroy']);
    Route::post("createOrUpdate", [TercerosController::class, 'createOrUpdateTercero']);
});

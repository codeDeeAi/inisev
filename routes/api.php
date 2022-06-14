<?php

use App\Http\Controllers\TenantController;
use App\Http\Controllers\TenantPostController;
use App\Http\Controllers\TenantUserController;
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

## Tenants Routes
Route::controller(TenantController::class)->group(function () {
    Route::post('/tenant', 'create');
});

Route::prefix('{tenant}')->group(function () {

    ## Tenants Users
    Route::controller(TenantUserController::class)->group(function () {
        Route::post('/user', 'create');
    });

    ## Tenants Posts
    Route::controller(TenantPostController::class)->group(function () {
        Route::post('/post', 'create');
    });

});

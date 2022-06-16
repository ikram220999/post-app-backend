<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//public routes
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('register', [UserController::class, 'register']);



//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/test', [UserController::class, 'test']);
    
});

Route::prefix('staff')->group(function () {
    Route::get('/', [StaffController::class, 'index']);
    Route::get('testrandom', [StaffController::class, 'testrandom']);
});

Route::prefix('store')->group(function () {
    Route::get('/', [StoreController::class, 'index']);
});

Route::prefix('state')->group(function () {
    Route::get('/', [StateController::class, 'index']);
});

Route::prefix('item')->group(function () {
    Route::get('/', [ItemController::class, 'index']);
    Route::post('new', [ItemController::class, 'store']);
});

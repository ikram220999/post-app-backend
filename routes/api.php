<?php

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

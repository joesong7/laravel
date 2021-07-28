<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
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

// 以下路由為被保護（必須登入才能使用）
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post("/post",[PostController::class,'store']);
    Route::put("/post/{id}",[PostController::class,'update']);
    Route::delete("/post/{id}",[PostController::class,'destroy']); 
    Route::post("/logout",[AuthController::class,'logout']);     
  
});
// 以下路由為公開
Route::post("login",[AuthController::class,'login']);
Route::post("/register",[AuthController::class,'register']);
Route::get("/post/select/{name}",[PostController::class,'select']);
Route::get("/post",[PostController::class,'index']);
Route::get("/post/{id}",[PostController::class,'show']);
Route::get("/address/{id}",[AddressController::class,'show']);     
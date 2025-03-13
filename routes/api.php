<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crochetController;
use App\Http\Controllers\Api\AuthController;

Route::post('register',[AuthController::class, 'register']);

Route::post('login',[AuthController::class, 'login']);

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('user-profile',[AuthController::class, 'userProfile']);
    Route::post('logout',[AuthController::class, 'logout']);
    
});

Route::get('/crochet', [crochetController::class, 'index']);

Route::get('/crochet/{id}', [crochetController::class, 'show']);

Route::post('/crochet', [crochetController::class, 'store']);

Route::put('/crochet/{id}', [crochetController::class, 'update']);

Route::delete('/crochet/{id}', [crochetController::class, 'destroy']);

Route::patch('/crochet/{id}', [crochetController::class, 'updatePartial']);


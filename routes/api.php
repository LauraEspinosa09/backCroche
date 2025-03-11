<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crochetController;

Route::get('/crochet', [crochetController::class, 'index']);

Route::get('/crochet/{id}', [crochetController::class, 'show']);

Route::post('/crochet', [crochetController::class, 'store']);

Route::put('/crochet/{id}', [crochetController::class, 'update']);

Route::delete('/crochet/{id}', [crochetController::class, 'destroy']);

Route::patch('/crochet/{id}', [crochetController::class, 'updatePartial']);


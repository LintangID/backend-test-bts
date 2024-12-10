<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChecklistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/checklists',[ChecklistController::class, 'index']);
    Route::post('/checklists',[ChecklistController::class, 'store']);
    Route::delete('/checklists/{id}',[ChecklistController::class, 'destroy']);

    Route::delete('/checklists/{id}',[ChecklistController::class, 'destroy']);
});

Route::post('/login',[AuthenticationController::class, 'login']);
Route::post('/register',[AuthenticationController::class, 'register']);

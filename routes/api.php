<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/checklists',[ChecklistController::class, 'index']);
    Route::post('/checklists',[ChecklistController::class, 'store']);
    Route::delete('/checklists/{id}',[ChecklistController::class, 'destroy']);
});

Route::get('/checklists/{checklistId}/item',[ItemController::class, 'index']);
Route::post('/checklists/{checklistId}/item',[ItemController::class, 'store']);
Route::get('/checklists/{checklistId}/item/{id}',[ItemController::class, 'show']);
Route::put('/checklists/{checklistId}/item/{id}',[ItemController::class, 'update']);
Route::delete('/checklists/{checklistId}/item/{id}',[ItemController::class, 'destroy']);
Route::put('/checklists/{checklistId}/item/rename/{id}',[ItemController::class, 'rename']);
Route::post('/login',[AuthenticationController::class, 'login']);
Route::post('/register',[AuthenticationController::class, 'register']);

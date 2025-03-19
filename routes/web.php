<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CharacterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [CharacterController::class, 'index']);
Route::get('character/{id}', [CharacterController::class, 'findCharacter']);
Route::post('character/save', [CharacterController::class, 'saveCharacter']);
Route::post('character/edit/{id}', [CharacterController::class, 'updateCharacter']);
Route::delete('character/delete/{id}', [CharacterController::class, 'deleteCharacter']);

Route::post('auth/register', [AuthController::class, 'register']);


Route::get('csrf-token', function (Request $request) {
  $token = $request->session()->token();
 
  $token = csrf_token();
  
  return response()->json(['csrf_token' => $token]);
});

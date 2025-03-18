<?php

use App\Http\Controllers\CharacterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CharacterController::class, 'index']);
Route::post('/save', [CharacterController::class, 'saveCharacter']);
Route::post('/edit', [CharacterController::class, 'editCharacter']);
Route::post('/delete', [CharacterController::class, 'deleteCharacter']);


Route::get('csrf-token', function () {
  return response()->json(['csrf_token' => csrf_token()]);
});

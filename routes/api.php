<?php

use App\Http\Controllers\Category\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route::get('/categories',[CategoryController::class, 'index']);
//return 'API';




/*
just testing the api to make sure we started correctly
Route::get('/categories', function () {
    return response()->json(['message' => 'API']);
});
*/
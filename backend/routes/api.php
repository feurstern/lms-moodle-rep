<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Movie;
use Database\Factories\BlogFactory;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get("users", [UserController::class, "index"]);
Route::get("/user-delete/{id}", [UserController::class, "delete"]);

Route::group(["prefix" => "blog"], function () {
    Route::post('/create', [BlogController::class, "create"]);
    Route::get("/delete/{id{}", [BlogController::class, "delete"]);
});


Route::prefix('product')->group(function () {
    Route::get('/list', [ProductController::class, "index"]);
    Route::post('/create', [ProductController::class, "store"]);
});


Route::group(["prefix" => "file"], function () {
    Route::get("/form", [FileController::class, "index"]);
    Route::post("delete/{id}", [FileController::class, "destroy"]);
});


Route::prefix('movies')->group(function () {
    Route::get("/home", [MovieController::class, "index"]);
    Route::get("/create-movie", [MovieController::class, "create"])->name("movies.create");
});

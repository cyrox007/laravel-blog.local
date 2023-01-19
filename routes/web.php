<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [MainController::class, "index"])->name("index");
Route::prefix("auth")->group(function(){
    Route::get("/login", [LoginController::class, "index"])->name("login");
    Route::post("/login", [LoginController::class, "login"])->name("check_user");
    Route::get("/logout", [LoginController::class, "logout"])->name("logout");
    Route::get("/registration", [LoginController::class, "register"])->name("register");
    Route::post("/registration", [LoginController::class, "register_user"]);
});

Route::prefix("posts")->group(function (){
    Route::get("/create", [PostController::class, "create"])->name("posts.create");
    Route::post("/create", [PostController::class, "create_post"]);

    Route::get("/{id}/edit", [PostController::class, "edit"])->name("posts.edit");
    Route::post("/{id}/edit", [PostController::class, "edit_post"]);

    Route::post("/{id}/delete", [PostController::class, "destroy"])->name('posts.delete');
});

Route::prefix("profile")->group(function () {
    Route::get("/{user}", [ProfileController::class, "index"])->name("profile");
});
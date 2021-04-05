<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index']);

//Controlleur pour le detail d'une recette
use App\Http\Controllers\RecipesController;
Route::get('/recettes/{url}',[RecipesController::class, 'show']);

//Controlleurs pour le CRUD des recettes
use App\Http\Controllers\RecettesController;
Route::resource('/admin/recettes', RecettesController::class);
Route::get('/admin/recettes/destroy/{url}', [RecettesController::class, 'destroy']);
Route::get('/admin/recettes/{url}/edit', [RecettesController::class, 'edit']);
Route::get('/admin/recettes/{url}/show', [RecettesController::class, 'show']);


Route::resource('/admin/recettes', RecettesController::class);

//Controlleurs pour le formulaire de contact
use App\Http\Controllers\ContactController;
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']); //VU A FAIRE

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

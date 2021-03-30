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
<<<<<<< HEAD
Route::resource('/admin/recettes', RecettesController::class);
Route::get('/admin/recettes.delete/{url}', [RecettesController::class, 'delete']);
=======
Route::get('/admin/recettes', 'RecettesController@index')->name('recettes.index');
Route::get('/admin/recettes/create', 'RecettesController@create')->name('recettes.create');
Route::post('/admin/recettes/', 'RecettesController@store')->name('recettes.store');
>>>>>>> 3bd36676d9e511560b551312eba4546b0c1226b6

Route::resource('/admin/recettes', RecettesController::class);

<<<<<<< HEAD
Route::resource('/admin/recettes', RecettesController::class);

=======
>>>>>>> 3bd36676d9e511560b551312eba4546b0c1226b6
//Controlleurs pour le formulaire de contact
use App\Http\Controllers\ContactController;
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
<<<<<<< HEAD
=======



>>>>>>> 3bd36676d9e511560b551312eba4546b0c1226b6

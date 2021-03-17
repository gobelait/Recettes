<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   function index() {
       // return view('welcome');
       $recipes = \App\Models\Recipe::all();

       return view('welcome',array(
           'recipes' => $recipes
       ));
   }


}

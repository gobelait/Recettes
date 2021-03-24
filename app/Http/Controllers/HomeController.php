<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   function index() {
       // return view('welcome');
       $recipes = \App\Models\Recipe::latest()->take(3)->get();

       return view('welcome',array(
           'recipes' => $recipes
       ));
   }


}

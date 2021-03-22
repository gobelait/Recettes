<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipesController extends Controller
{
  function index() {
      return view('recipes');
  }

  public function show($recipe_name) {
   $recipe = \App\Models\Recipe::where('recipe_name',$recipe_name)->first(); //get first recipe with recipe_nam == $recipe_name

   return view('recipes/single',array( //Pass the recipe to the view
       'recipe' => $recipe
   ));
}

}

<?php

namespace App\Http\Controllers;

use Request;

class RecipesController extends Controller
{
  function index() {


      if($titleRecipe = Request::segment(2) != null){
      $recipe = show($titleRecipe);

    }else{
      return view('recipes');
    }
  }

  public function show($recipe_name) {
   $recipe = \App\Models\Recipe::where('title',$recipe_name)->first(); //get first recipe with recipe_nam == $recipe_name

   $author = $this->getUserById($recipe->author_id);

   return view('recipesShow')
            ->with('recipe', $recipe)
            ->with('author', $author);
}

public function getUserById($id){
    $user =  \App\Models\User::where('id',$id)->first();
    return $user;
}

}

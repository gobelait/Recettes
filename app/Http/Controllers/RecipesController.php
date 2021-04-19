<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RecipesController extends Controller
{
  function index(Request $request) {


      if($titleRecipe = $request->segment(2) != null){
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

  // Save Comment
  function save_comment(Request $request){
    $data=new \App\Models\Comment;
    $data->recipe_id=$request->segment(3);
    $data->author_id = Auth::user()->id  ; 
    $data->content=$request->comment;
    $data->date= date("Y-m-d H:i:s");
    $data->save();
    return response()->json([
        'bool'=>true
    ]);
  }

  //funtions pour likes
  public function getlike(Request $request)
  {
      $recipe = Recipe::find($request->recipe);
      return response()->json([
          'recipe'=>$recipe,
      ]);
  }

  public function like(Request $request)
  {
      $recipe = Recipe::find($request->recipe);
      $value = $recipe->like;
      $recipe->like = $value+1;
      $recipe->save();
      return response()->json([
          'message'=>'Thanks',
      ]);
  }    

  //funtions pour dislikes
  public function getDislike(Request $request)
  {
      $recipe = Recipe::find($request->recipe);
      return response()->json([
          'recipe'=>$recipe,
      ]);
  }

  public function dislike(Request $request)
  {
      $recipe = Recipe::find($request->recipe);
      $value = $recipe->dislike;
      $recipe->dislike = $value+1;
      $recipe->save();
      return response()->json([
          'message'=>'Thanks',
      ]);
  }

  // Recupere l'utilisateur
  public function getUserById($id){
      $user =  \App\Models\User::where('id',$id)->first();
      return $user;
  }

}

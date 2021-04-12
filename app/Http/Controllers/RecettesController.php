<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Recipe;

use Validator,Redirect,Response,File;
use Intervention\Image\Facades\Image;

class RecettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $recipes = \App\Models\Recipe::get();

      return view('recipes',array(
          'recipes' => $recipes
      ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipesAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'ingredients' => 'required',
            'url' => 'required|max:200',
            'tags' =>'nullable',
            'status' => 'required|max:45',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($files = $request->file('image')) {
            $destinationPath = public_path('/images'); //chemin d'upload
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
         }

        $recette = new Recipe($request->all());
        $recette['image'] = "images/".$profileImage;
        $recette['author_id'] = 1;
        $recette['date']=now();
        $recette->save();

        return redirect(route('recettes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe, Request $request)
    {

      $idRecipe = $request->segment(3); //recupere l'id
      $recipe = Recipe::where('id',$idRecipe)->first();

      $author = $this->getUserById($recipe->author_id);

      return view('recipesShow')
               ->with('recipe', $recipe)
               ->with('author', $author);
    }

    public function getUserById($id){
        $user =  \App\Models\User::where('id',$id)->first();
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe, Request $request)
    {
        $idRecipe = $request->segment(3);
        $recipe = Recipe::where('id',$idRecipe)->first();
        return view('recipesEdit',array(
            'recipe' => $recipe
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update($idRecipe, Request $request)
    {
        $recipe = Recipe::findOrFail($idRecipe);
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'ingredients' => 'required',
            'url' => 'required|max:200',
            'tags' =>'nullable',
            'status' => 'required|max:45'
        ]);

        $input = $request->all();
        $recipe->fill($input)->save();
        return redirect(route('recettes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe, Request $request)
    {
            $idRecipe = $request->segment(3); //recupere l'id
            $recipe = Recipe::where('id',$idRecipe)->first();
            $message = "{$recipe->title} a bien été supprimer.";
            $recipe->delete();
            return redirect(route('recettes.index'))->with('success',$message);

    }
}

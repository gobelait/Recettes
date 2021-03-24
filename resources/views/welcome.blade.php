
@extends('layouts/main')

      @section('content')
      <h1>Home</h1>
      <ul>
        <?php $lastRecipes = array_slice((array)$recipes, -3, 3, true); ?>
      @foreach ( $recipes as $recipe )
        <li> <a href="http://127.0.0.1:8000/recettes/{{ $recipe->title }} ">{{ $recipe->title }}</a> </li>

      @endforeach
      </ul>



      @endsection

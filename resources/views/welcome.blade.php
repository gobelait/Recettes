<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravelzer</title>

    </head>
    <body>
@extends('layouts/main')

      @section('content')
      <h1>Home</h1>
      <ul>
        <?php $lastRecipes = array_slice((array)$recipes, -3, 3, true); ?>
      @foreach ( $recipes as $recipe )
        <li> <a href="http://127.0.0.1:8000/recettes/">{{ $recipe->title }}</a> </li>
      @endforeach
      </ul>



      @endsection

    </body>
</html>

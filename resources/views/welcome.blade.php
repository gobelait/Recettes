
@extends('layouts/main')

      @section('content')
      <h1>Home</h1>
      <ul>
      @foreach ( $recipes as $recipe )
        <li> <a href="http://127.0.0.1:8000/recettes/{{ $recipe->title }} ">{{ $recipe->title }}</a> </li>

      @endforeach
      </ul>



      @endsection

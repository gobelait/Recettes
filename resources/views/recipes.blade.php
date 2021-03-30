
@extends('layouts/main')

      @section('content')
      <h1>Recettes</h1>

      <a href="/"></a>

      <a class="btn" href="{{ route('recettes.create') }}" title="Ajouter une recette"> <i class="fas fa-plus-circle"></i> Ajout </a>
      @endsection

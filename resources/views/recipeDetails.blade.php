<?php use App\Models\User ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
@extends('layouts/main')

      @section('content')


      <h1>Recettes : {{$recipe->title}}  </h1>

      <h1> Auteur : {{$author->name}}  </h1>

      @endsection

    </body>
</html>

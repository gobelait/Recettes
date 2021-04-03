
@extends('layouts/main')

      @section('content')
      <h1>Recettes</h1>

      <a href="/"></a>


@if(\Session::has('success'))
      <div class="alert alert-danger">
        <h4>{{ \Session::get('success') }}</h4>
      </div>
      <hr>
@endif

      <body>
      <div class="container-lg">
          <div class="table-responsive">
              <div class="table-wrapper">
                  <div class="table-title">
                      <div class="row">
                          <div class="col-sm-8"><h2>Liste des <b>recettes</b></h2></div>
                          <div class="col-sm-4">
                              <a type="button" href="{{ route('recettes.create') }}"  class="btn btn-info add-new" ><i class="fa fa-plus"></i> Add New</a>
                          </div>
                      </div>
                  </div>
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Titre</th>
                              <th>Auteur</th>
                              <th>Difficulté</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ( $recipes as $recipe )

                          <tr>
                              <td> <a href="#"> {{ $recipe->title }} </a> </td>
                              <td>{{$recipe->date}}</td>
                              <td> {{$recipe->status }} </td>
                              <td>
                                <!-- Bouton de modification d'une recette  -->
                                  <a class="edit" href="recettes/{{$recipe->id}}/edit " title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>

                                <!-- Bouton des vues détaillées d'une recette  -->
                                  <a class="show" href="recettes/{{$recipe->id}}/show" title="Show"><i class="material-icons">remove_red_eye</i></a>

                                <!-- Bouton de suppresion d'une recette  -->
                                  <form action="{{ route('recettes.destroy',$recipe->id) }}" method="POST">
                                  {{ method_field('DELETE') }}
                                  @csrf
                                  <input type="hidden" name="_method" value="DELETE">

                                      <button type="submit" >
                                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i> </a>
                                      </button>


                                  </form>
                              </td>
                          </tr>
                          @endforeach


                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      </body>
      @endsection

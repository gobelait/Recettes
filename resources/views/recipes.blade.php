
@extends('layouts/main')

      @section('content')
      <h1>Recettes</h1>

      <a href="/"></a>

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
                                  <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                  <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                  <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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

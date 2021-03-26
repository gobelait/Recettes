
@extends('layouts/main')

      @section('content')
      <h1>Contact</h1>

      <form action="/contact" method="post">
          @csrf
          <div>
              <label for="name">Nom :</label>
              <input type="text" id="name" name="name" class="@error('title') is-invalid @enderror">
              @if ($errors->first('name'))
                 <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
          </div>
          <div>
              <label for="email">e-mail :</label>
              <input type="email" id="email" name="email">
              @if ($errors->first('email'))
                 <div class="alert alert-danger">{{ $errors->first('email') }}</div>
              @endif
          </div>
          <div>
              <label for="message">Message :</label>
              <textarea id="message" name="message"></textarea>
              @if ($errors->first('message'))
                  <div class="alert alert-danger">{{ $errors->first('message') }}</div>
              @endif
          </div>
          <div>
              <input class="btn btn-primary mt-3" type="submit" name="envoyer" value="Envoyer">
          </div>
      </form>

      @endsection



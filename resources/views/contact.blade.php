
@extends('layouts/main')

      @section('content')
      <h1>Contact</h1>

      <form action="/contact" method="post">
          @csrf
          <div>
              <label for="name">Nom :</label>
              <input type="text" id="name" name="name" class="@error('title') is-invalid @enderror">
              @error('title')
                 <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
          <div>
              <label for="email">e-mail :</label>
              <input type="email" id="email" name="email">
          </div>
          <div>
              <label for="message">Message :</label>
              <textarea id="message" name="message"></textarea>
          </div>
          <div>
              <input type="submit" name="envoyer" value="Submit">
          </div>
      </form>

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif


      <!--      -->
      <?php
//      echo Form::open(['action' => 'route(\'contact.store\')', 'method' => 'POST']);
//      echo Form::text('username','Username');
//      echo '<br/>';
//
//      echo Form::text('email', 'example@gmail.com');
//      echo '<br/>';
//
//
//      echo Form::submit('Click Me!');
//      echo Form::close();
//
      ?>
      @endsection



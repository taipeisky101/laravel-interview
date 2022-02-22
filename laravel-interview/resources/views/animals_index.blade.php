@extends('layouts.master')
@section('title', 'Animals')
@section('content')
<html>
   <head>
      <link rel="stylesheet" href="{{ URL::asset('app.css'); }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   </head>
   <body>
      <br><h2 align = "center">Animals</h2><br>
      <div class="container marketing">
        <div class="row">
          @foreach ($animals as $animal)
            <div class="col-lg-3">
              <h2>{{ $animal['id'] }} {{ $animal['name'] }}</h2>
              <img class="" src=<?php $name = preg_replace("/ /","_",$animal['name']); echo URL::asset("images/$name.jpg");?> alt="Generic placeholder image" width="140" height="140">
              <br>
              <img class="" src=<?php $name = $animal['type']; echo URL::asset("images/$name.jpg");?> alt="Generic placeholder image" width="30" height="30">
              </a>
              ${{ $animal['price'] }}
              <br><br>
            </div>
          @endforeach
        </div>
        <br>
        <div>
            <?php
              echo Form::open(array('url' => "/animals", 'method' => 'get'));
                  echo Form::select('type', array('dog' => 'Dogs', 'cat' => 'Cats', 'cow' => "Cows"));
                  echo '<br/><br/>';

                  echo Form::number('numberOfAnimals');
                  echo '<br/><br/>';

                  echo Form::submit('Select');
              echo Form::close();
            ?>
        </div>
      </div>
   </body>
</html>
@endsection
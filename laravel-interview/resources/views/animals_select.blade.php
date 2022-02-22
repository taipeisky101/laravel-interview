@extends('layouts.master')
@section('title', 'Selected Animals')
@section('content')
<html>
   <head>
      <link rel="stylesheet" href="{{ URL::asset('app.css'); }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   </head>
   <body>
      <br><h2 align = "center">Selected Animals</h2><br>
      <div class="container marketing">
        <div class="row">
          @foreach ($data as $animal)
            <div class="col-lg-3">
              <h2>{{ $animal['id'] }} {{ $animal['name'] }}</h2>
              <img class="" src=<?php $name = preg_replace("/ /","_",$animal['name']); echo URL::asset("images/$name.jpg");?> alt="Generic placeholder image" width="140" height="140">
              <br>
              <img class="" src=<?php $name = $animal['type']; echo URL::asset("images/$name.jpg");?> alt="Generic placeholder image" width="30" height="30">
              </a>
              ${{ $animal['price'] }} x {{ $animal['quantity'] }}
              <br><br>
            </div>
          @endforeach
        </div>
        <div>
          <?php
            echo Form::open(array('url' => "/animals/index", 'method' => 'get'));
                echo Form::submit('Re-select');
            echo Form::close();
          ?><br><br>
        </div>
        <form action='/buy' method='post'>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <label for="customerID">Customer: </label>
          <select name="customer_id" id="customerID">
            @foreach ($customers as $customer)
            <option value="{{ $customer->id }}" >{{ $customer->name }}</option>
            @endforeach
          </select>
          <br>
          <label for="numberOfAnimals">Total Number: {{ $numberOfAnimals }} {{ $type }}(s)</label>
          <input type="hidden" id="numberOfAnimals" name="number_of_animals" value={{$numberOfAnimals}}><br>
          <input type="hidden" id="type" name="type" value={{$type}}>
          <label for="totalPrice">Total Price: ${{ $totalPrice }} CAD</label>
          <input type="hidden" id="totalPrice" name="total_price" value={{$totalPrice}}><br>
          <input type="submit" value="Buy">
        </form>
      </div>
   </body>
</html>
@endsection
@extends('layouts.master')
@section('title', 'Transactions')

@section('content')
<html>
   <head>
      <link rel="stylesheet" href="{{ URL::asset('app.css'); }}">
   </head>
   <body>
      <br><h2 align = "center">Transactions History</h2><br>
      <table class = "container">
         <div>
            <tr>
               <th>ID</th>
               <th>Customer ID</th>
               <th>Animal Type</th>
               <th>Number of Animals</th>
               <th>Total Price</th>
               <th>Created Date</th>
               <th></th>
            </tr>
         </div>
         @foreach ($transactions as $transaction)
         <div>
            <tr>
               <td>{{ $transaction->id }}</td>
               <td>{{ $transaction->customer_id }}</td>
               <td>{{ $transaction->type }}</td>
               <td>{{ $transaction->number_of_animals }}</td>
               <td>{{ $transaction->total_price }}</td>
               <td>{{ $transaction->created_at }}</td>
               <td>
                  <?php
                     echo Form::open(array('url' => "transaction/$transaction->id", 'method' => 'delete'));
                     echo Form::submit('Delete');
                     echo Form::close();
                  ?>
               </td>
            </tr>
         </div>
         @endforeach
      </table>
      <br>
      <div align = "center">
         <tr>
            <td>
               <?php
                  echo Form::open(array('url' => 'animals/index', 'method' => 'get'));
                  echo Form::submit('Add Transaction');
                  echo Form::close();
               ?>
            </td>
         </tr>
      </div>
   </body>
</html>
@endsection
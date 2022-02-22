@extends('layouts.master')
@section('title', 'Customers')

@section('content')
<html>
   <head>
      <link rel="stylesheet" href="{{ URL::asset('app.css'); }}">
   </head>
   <body>
      <br><h2 align = "center">Manage Customers</h2><br>
      <table class = "container">
         <div>
            <tr>
               <th>ID</td>
               <th>Customer Name</td>
               <th>Fund</td>
               <th></th>
               <th></th>
            </tr>
         </div>
         @foreach ($customers as $customer)
         <div>
            <tr>
               <td>{{ $customer->id }}</td>
               <td>{{ $customer->name }}</td>
               <td>{{ $customer->fund }}</td>
               <td>
                  <?php
                     echo Form::open(array('url' => "customer/$customer->id", 'method' => 'get'));
                     echo Form::submit('Show');
                     echo Form::close();
                  ?>
               </td>
               <td>
                  <?php
                     echo Form::open(array('url' => "customer/$customer->id", 'method' => 'delete'));
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
                  echo Form::open(array('url' => 'customer/create', 'method' => 'get'));
                  echo Form::submit('Add Customer');
                  echo Form::close();
               ?>
            </td>
         </tr>
      </div>
   </body>
</html>
@endsection
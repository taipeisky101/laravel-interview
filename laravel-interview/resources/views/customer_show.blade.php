@extends('layouts.master')
@section('title', 'Customer Information')

@section('content')
<html>
   <body>
      <br><h2 align = "center">Show Customer Form</h2><br>
      <div class = "container">
         <tr>
            <td>ID: </td>
            <td>{{ $customer->id }}</td>
         </tr><br>
         <tr>
            <td>Name: </td>
            <td>{{ $customer->name }}</td>
         </tr><br>
         <tr>
            <td>Fund: </td>
            <td>{{ $customer->fund }}</td>
         </tr><br>
         <tr>
            <td>Creation Date: </td>
            <td>{{ $customer->created_at }}</td>
         </tr><br>
         <tr>
            <td>Update Date: </td>
            <td>{{ $customer->updated_at }}</td>
         </tr><br><br>
         <tr>
            <td>
               <?php
                  echo Form::open(array('url' => "customer/$customer->id/edit", 'method' => 'get'));
                  echo Form::submit('Edit');
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
            <td>
               <?php
                  echo Form::open(array('url' => "customers", 'method' => 'get'));
                  echo Form::submit('Go Back');
                  echo Form::close();
               ?>
            </td>
         </tr>
      </div>
   </body>
</html>
@endsection
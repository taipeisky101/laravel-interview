@extends('layouts.master')
@section('title', 'Alter Customer')

@section('content')
<html>
   <body>
      <br><h2 align = "center">Edit Customer</h2><br>
      <div class = "container">
         <?php
            echo Form::open(array('url' => "/customer/$customer->id", 'method' => 'put'));
               echo "Customer name: <br/>";
               echo Form::text('name', $customer->name);
               echo '<br/><br/>';
               echo "Fund: <br/>";
               echo Form::number('fund', $customer->fund);
               echo '<br/><br/>';
               echo Form::submit('Update');
            echo Form::close();

            echo Form::open(array('url' => "customer/$customer->id", 'method' => 'get'));
               echo Form::submit('Cancel');
            echo Form::close();
            ?>
      </div>
   </body>
</html>
@endsection
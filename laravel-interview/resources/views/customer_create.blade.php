@extends('layouts.master')
@section('title', 'New Customer')

@section('content')
<html>
   <body>
      <br><h2 align = "center">New Customer</h2><br>
      <form action='/customer/create' method='post' class = "container">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <label for="name">Customer name:</label><br>
         <input type="text" id="name" name="name" value="John Pitcher"><br><br/>
         <label for="fund">Fund:</label><br>
         <input type="int" id="fund" name="fund" value=555><br><br>
         <input type="submit" value="Create">
      </form>
   </body>
</html>
@endsection
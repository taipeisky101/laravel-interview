<html>
   <head>
        <title>@yield('title')</title>
   </head>
   <body>
        @include('layouts.navbar')
        @yield('content')
        <div align = "center">
            <br><br><br>
            <h6>Copyright @ FansUnite 2022</h6>
            <br><br><br>
        </div>
   </body>
</html>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" value="{{ csrf_token() }}"> 
        
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
      <div id ="app">
        @yield('content')
      </div>
      <script src="/js/app.js"></script>
    </body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <title>archan</title>
   <style type="text/css">
      @font-face {
         font-family: "PlayfairDisplay";
         src: "{{ asset('font/PlayfairDisplay-Regular.ttf') }}";
      }
      
      * {
         font-family: "PlayfairDisplay";
         cursor: url('{{ asset('cursor/cursor.cur') }}'), auto;
      }
      a {
         cursor: url('{{ asset('cursor/cursor.cur') }}'), auto;
      }
   </style>
</head>
<body class="bg-gray-900">
   <main>
      @yield('main')
   </main>
</body>
</html>
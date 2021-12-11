<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <title>Dchan @yield('title') </title>
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

      @yield('style')

   </style>

   @yield('head')
   
</head>

@yield('body')

</html>
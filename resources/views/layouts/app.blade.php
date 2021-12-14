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
      .body-bg{
          background-color:#323b49;
          background-image: linear-gradient(180deg, #202225 0%,#36393f 50%, #4f545c 100%);
      }

      @yield('style')

   </style>

   @yield('head')
   
</head>

@yield('body')

</html>
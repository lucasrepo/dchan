<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <title>Dchan: @yield('title') </title>
   <style type="text/css">
      @font-face {
         font-family: "PlayfairDisplay";
         src: "{{ asset('font/PlayfairDisplay-Regular.ttf') }}";
      }
      * {
         font-family: "PlayfairDisplay";
      }
      .body-bg{
          background-color:#323b49;
          background-image: linear-gradient(180deg, #202225 0%,#36393f 50%, #4f545c 100%);
      }

      @yield('style')

   </style>

   @yield('head')
   
</head>
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0">
  <header class="max-w-lg mx-auto">
    <a href="{{ asset('/') }}" class="text-4xl font-bold text-gray-100 flex flex-row justify-center items-center hover:animate-ping">
        <span class="text-green-500">D</span>chan
    </a>
  </header>
@yield('body')
</body>
</html>
@extends('layouts.app')

@section('body')
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0">
  <header class="max-w-lg mx-auto">
        <a href="#" class="text-4xl font-bold text-gray-100 flex flex-row justify-center items-center hover:animate-ping">
            <span class="text-green-500">D</span>chan
        </a>
    </header>

{{-- CAJAS --}}
{{-- recordar poner substr a los post y boards --}}
  <main>
    <div class="p-2 grid grid-rows-3 grid-flow-col gap-4">
      <div class="p-2 rounded-md border-double border-2 border-gray-700 row-span-3 bg-black text-white text-center">
      	<h1 class="text-lg">Publicaciones recientes</h1>
        <ul>
          @for($i=0;$i<=12; $i++)
          <li><span class="text-green-600">board: </span><a href="{{ asset($i) }}" class="hover:underline hover:text-green-400">{{ $i }}</a></li>
          @endfor
        </ul>
      </div>
      <div class="p-2 rounded-md border-double border-2 border-gray-700 col-span-2 bg-black text-white text-center" style="max-height: 50px;">
      	@php $links = array('faq', 'rules', 'news', '$$$', 'account') @endphp
      	@for($i=0;$i<=count($links)-1;$i++)
      		<a class="text-lg px-2 text-green-600 hover:underline hover:text-green-400" href="{{ asset($links[$i]) }}">/{{ $links[$i] }}/</a>
      	@endfor

      </div>
      <div class="p-2 rounded-md border-double border-2 border-gray-700 row-span-2 col-span-2 bg-black text-white text-center truncate">
      	<h1 class="text-lg">Boards recientes</h1>
        <ul>
          @for($i=0;$i<=6; $i++)
          <li><a href="{{ asset($i) }}" class="hover:underline hover:text-green-400">{{ $i }}</a></li>
          @endfor
        </ul>
      </div>
    </div>
    {{-- LATEST NEWS --}}

    @php $ltNews = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." @endphp
    <div class="p-5">
      <div class="text-center text-white" style="font-size: 20px;">Latest News</div>
      <div class="text-center text-white" style="font-size: 15px;">{{ $ltNews }}
      </div>
    </div>


    {{-- STATS --}}
    @php $a=10; $b=10; $c=10; @endphp

    <div class="grid justify-items-stretch">
      <div class="justify-self-center text-center text-white bg-black w-6/12 p-2 ">STATS</div>
    </div>

    <div class="text-center text-white p-1">
      <p class="text-sm">Publicaciones totales: {{ $a }}</p>
      <!---<p class="text-sm">Unique posters: </p>---->
      <p class="text-sm">Media: {{ $c }}MB</p>
    </div>

    <div class="text-center text-gray-200 p-1">admin@archan.org</div>
  </main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="vanilla-tilt.js"></script>
<script type="text/javascript">
      VanillaTilt.init(document.querySelector(".card"), {
      max: 5,
      speed: 100
       });
</script>
</body>
@endsection
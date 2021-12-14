@extends('layouts.app')

@section('style')
@-webkit-keyframes fadeIn {
    0% {opacity: 0;}
    100% {opacity: 1;}
}    
@keyframes fadeIn {
    0% {opacity: 0;}
    100% {opacity: 1;}
}
.fadeIn {
    -webkit-animation-name: fadeIn;
    animation-name: fadeIn;
}
.animated {
    -webkit-animation-duration: 3s;
    animation-duration: 3s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
@endsection

@section('body')
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0">
    
    <header class="max-w-lg mx-auto">
        <a href="{{ asset('/') }}" class="text-4xl font-bold text-gray-100 flex flex-row justify-center items-center hover:animate-ping">
            <span class="text-green-500">D</span>chan
        </a>
    </header>

    <main class="animated fadeIn">
    @component('components.card')
        @slot('content')
        <section>
           <h3 class="font-extrabold">
               Bienvenido a Dchan
            </h3>

            <p class="text-gray-700 font-semibold">
                @yield('subtitle')
            </p>

        </section>
        <section class="mt-10">   
            <form class="flex flex-col" method="post" action="@yield('action')">
                @csrf
                @yield('form')
                <div>   
                    <button type="submit" name="button" class="w-full h-10 bg-green-500 text-gray-50 hover:bg-green-500 hover:text-gray-100 rounded-xl hover:rounded-3xl font-bold drop-shadow-2xl transition-all duration-500">Ingresar</button>
                </div>
            </form>
        </section>
        @endslot
    @endcomponent

    <div class="text-center text-gray-400 text-m font-bold">
        @yield('answer') 
    </div>
    </main>

     <footer>
         <div class="text-center pt-5 text-sm text-gray-500">
             <a href="#">Contacto</a>
             <span>.</span>
             <a href="#">Privacidad</a>
         </div>
     </footer>
    
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
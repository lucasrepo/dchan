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
@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
@section('body')

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
                
                @if($errors->any())
                   @foreach ($errors->all() as $error)
                        @component('components.alert')
                            @slot('color', 'red') 
                            @slot('content', $error)
                        @endcomponent
                  @endforeach
                @endif

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
    
<script type="text/javascript" src="{{ asset('js/vanilla-tilt.js') }}"></script>
<script type="text/javascript">
    VanillaTilt.init(document.querySelector(".card"), {
    max: 5,
    speed: 100
     });
</script>
@endsection
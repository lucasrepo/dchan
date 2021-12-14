@extends('layouts.app')

@section('body')
@isset($_GET["token"])
	@isset($owner)
	@component('components.alert')
	@slot('color', 'green')
	@slot('content')
		<p class="font-bold">Su cuenta se creó con éxito</p>
	    <p class="text-sm">Guarda este código de acceso: @php echo htmlspecialchars($_GET['token']); @endphp. ¡No lo pierdas!</p>
	@endslot
	@endcomponent
	@endisset
@endisset

	<div class="text-white text-center p-6">{{ $user->username }}</div>

@if(count($boards) <= 1 && $boards !== null)
	<div>Board: {{ $boards[0] }}</div>
@elseif(count($boards) > 1)
	<div>Boards:
@foreach($boards as $board)
	<span class="text-green-600">{{ $board }}</span>
@endforeach
	</div>
@endif

@isset($owner)
	@component('components.button')
		@slot('color', 'blue')
		@slot('link', '#')
		@slot('content', 'Crear board')
	@endcomponent

	@component('components.button')
		@slot('color', 'red')
		@slot('link', asset('sign-out'))
		@slot('content', 'Salir de sesión')
	@endcomponent
@endisset
@endsection
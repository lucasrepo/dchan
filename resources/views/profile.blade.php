@extends('layouts.app')
@section('title', 'Perfil')
@section('body')

@isset($alert)
	@component('components.alert')
	    @slot('color', 'green') 
	    @slot('content', $alert)
	@endcomponent
@endif
	<div class="text-white text-center p-6">{{ $user->username }}</div>

@isset($boards)
	<div>Boards:
	@foreach($boards as $board)
		@foreach($board as $link => $name)
			<a class="text-green-600" href="{{ asset($link) }}">{{ $name }}</a>
		@endforeach
	@endforeach
	</div>
@endisset

@isset($owner)
	@component('components.button')
		@slot('color', 'blue')
		@slot('link', asset('crear-board'))
		@slot('content', 'Crear board')
	@endcomponent

	@component('components.button')
		@slot('color', 'red')
		@slot('link', asset('sign-out'))
		@slot('content', 'Salir de sesión')
	@endcomponent
@endisset
@endsection
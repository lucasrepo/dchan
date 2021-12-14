@extends('layouts.account')

@section('title', 'login')
@section('subtitle', 'Ingresá a tu cuenta')

@section('action', asset('login'))

@section('form')
@isset($error)
   @component('components.forms.alert')
   @slot('alert', $error)
   @endcomponent
@endisset

@component('components.forms.input')
    @slot('label', 'Código de acceso')
    @slot('type', 'text')
    @slot('name', 'login')
    @slot('id', 'login')
@endcomponent

@component('components.forms.input')
    @slot('label', 'Contraseña')
    @slot('type', 'password')
    @slot('name', 'password')
    @slot('id', 'password')
@endcomponent

<div class="flex justify-end">
	<a href="{{ asset('reset-password') }}" class="text-sm text-gray-500 hover:text-green-700 hover:underline mb-6 transition duration-200">¿Olvidaste tu contraseña?</a>
</div>
@endsection

@section('answer')
	<p id="login">¿No tienes una cuenta? <a href="{{ asset('register') }}" class="underline hover:text-green-500 transition duration-500">¡Registrate!</a></p>
@endsection
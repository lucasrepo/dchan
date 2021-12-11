@extends('layouts.account')
@section('title', 'recuperar contraseña')
@section('subtitle', 'Recupera tu cuenta')

@section('action', 'reset-password')

@section('form')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-center text-red-500 text-1xl">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@component('components.forms.input')
    @slot('label', 'Correo electronico')
    @slot('type', 'email')
    @slot('name', 'email')
    @slot('id', 'email')
@endcomponent

@endsection

@section('answer')
	<p id="login">¿No tienes una cuenta? <a href="{{ asset('register') }}" class="underline hover:text-green-500 transition duration-500">¡Registrate!</a></p>
@endsection
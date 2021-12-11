@extends('layouts.account')

@section('title', 'registro')
@section('subtitle', 'Crea tu cuenta')
@section('action', 'login')

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

@component('components.forms.input')
    @slot('label', 'Contraseña')
    @slot('type', 'password')
    @slot('name', 'password')
    @slot('id', 'password')
@endcomponent

@component('components.forms.input')
    @slot('label', 'Verificar contraseña')
    @slot('type', 'password')
    @slot('name', 'password2')
    @slot('id', 'password2')
@endcomponent

<div class="place-self-center p-2">
    {!! captcha_img() !!}
</div>

@component('components.forms.input')
    @slot('label', 'Verificar captcha')
    @slot('type', 'text')
    @slot('name', 'captcha')
    @slot('id', 'captcha')
@endcomponent

@endsection

@section('answer')
	<p id="login">Tienes una cuenta? <a href="{{ asset('login') }}" class="underline hover:text-green-500 transition duration-500">¡Inicia sesión!</a></p>
@endsection
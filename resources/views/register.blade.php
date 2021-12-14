@extends('layouts.account')

@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('title', 'registro')
@section('subtitle', 'Crea tu cuenta')
@section('action', asset('register'))

@section('form')

@if($errors->any())
   @foreach ($errors->all() as $error)
        @component('components.alert')
            @slot('color', 'red') 
            @slot('content', $error)
        @endcomponent
  @endforeach
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

<div class="place-self-center p-2 captcha">
    <span>{!! captcha_img() !!}</span>
    <button type="button" class="btn btn-danger" class="reload" id="reload">Nuevo captcha</button>
</div>

<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>

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
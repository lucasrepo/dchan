@extends('layouts.account')
@section('title', 'Crear board')
@section('subtitle', 'Crea tu board')
@section('action', asset('crear-board'))

@section('form')

@component('components.forms.input')
    @slot('label', 'Nombre del board')
    @slot('type', 'text')
    @slot('name', 'name')
    @slot('id', 'name')
@endcomponent

@component('components.forms.input')
    @slot('label', 'Tags')
    @slot('type', 'text')
    @slot('name', 'tags')
    @slot('id', 'tags')
    @slot('placeholder', '/hum/, humanidad, discusión')
@endcomponent

@component('components.forms.textarea')
    @slot('label', 'Descripción del board')
    @slot('name', 'description')
    @slot('id', 'description')
@endcomponent

<div class="place-self-center p-2 captcha border-double border-4 border-green-600 mb-3">
    <span id="reload" class="reload" alt="nuevo captcha">{!! captcha_img() !!}</span>
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
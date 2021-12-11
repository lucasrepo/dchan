@extends('layouts.app')

@section('main')
@isset($error)
	<div class="text-white text-center p-7">El usuario no existe</div>
@endisset
@endsection
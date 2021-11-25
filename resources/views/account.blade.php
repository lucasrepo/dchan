@extends('layouts.app')

@section('main')
<div class="grid justify-items-stretch p-6">
	<div class="justify-self-center">
		<div class="p-2 rounded-md border-double border-2 border-gray-700 row-span-2 col-span-2 bg-black text-white text-center">
			<h1 class="p-2 text-3xl">Cuenta</h1>
				
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li class="text-center text-red-500 text-1xl">{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			<div class="rounded-md border-double border-2 border-gray-700 border-b-0 border-r-0 border-l-0 border-b-0">

				<h5 class="p-2">Iniciar sesión</h5>
				<form method="post" action="{{ asset('login') }}">
					@csrf
					<input type="text" name="login" class="m-1 h-8 text-center text-black w-3/4" placeholder="login" value="{{ old('login') }}"><br>
					<input type="text" name="password" class="m-1 h-8 text-center text-black w-3/4" placeholder="contraseña" value="{{ old('sign_password') ?? "demo123" }}"><br>
					<input type="submit" name="submit" value="Iniciar sesión" class="px-4 py-2 bg-white text-black hover:text-white hover:bg-gray-900 rounded my-4 w-full">
				</form>
			</div>
			<div class="rounded-md border-double border-2 border-gray-700 border-b-0 border-r-0 border-l-0 border-b-0">
				<h5 class="p-2">Registrarse</h5>
				<form method="post" action="{{ asset('register') }}">
					@csrf
					<input type="email" name="email" class="m-1 h-8 text-center text-black w-3/4" placeholder="correo electronico" value="{{ old('email') }}"><br>
					<input type="password" name="password" class="m-1 h-8 text-center text-black w-3/4" placeholder="contraseña" value="{{ old('password') ?? "demo123" }}"><br>
					<input type="password" name="password2" class="m-1 h-8 text-center text-black w-3/4" placeholder="verificar contraseña"><br>
					
					<div class="flex items-center">
						<div class="p-2">
							<div>{!! captcha_img() !!}</div>
						</div>
						<div class="inline"><input type="text" placeholder="Ingresa el captcha" class="m-1 h-8 text-center text-black" name="captcha"></div>
					</div>

					<input type="submit" name="submit" value="Registrarse" class="px-4 py-2 bg-white text-black hover:text-white hover:bg-gray-900 rounded my-4 w-full">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
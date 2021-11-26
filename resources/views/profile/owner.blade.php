@extends('layouts.app')

@section('main')

@isset($_GET["token"])
{{-- NOTIFICACIÓN CON TOKEN --}}
<div class="p-2">
  <div class="bg-green-400 border-t-4 border-green-200 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
    <div class="flex">
      <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
      <div>
        <p class="font-bold">Su cuenta se creó con éxito</p>
        <p class="text-sm">Guarda este código de acceso: @php echo htmlspecialchars($_GET['token']); @endphp. ¡No lo pierdas!</p>
      </div>
    </div>
  </div>
</div>
@endisset
@endsection
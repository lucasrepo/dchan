<div class="mb-6 pt-3 rounded bg-gray-200">
    <label for="{{$id}}" class="block text-gray-700 text-sm font-bold mb-1 ml-2">
        {{ $label }}
    </label>
    <input type="{{$type}}" name="{{$name}}" id="{{$id}}" value="{{ old($name) }}" placeholder="{{ $placeholder ?? ''}}" class="bg-gray-200 rounded w-full text-gray-700 focus:bg-gray-300 focus:outline-none border-b-4 border-gray-300 focus:border-green-500 transition duration-500 px-3 pb-2" required>
</div>
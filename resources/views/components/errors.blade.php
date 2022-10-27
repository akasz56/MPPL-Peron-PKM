@props(['errors'])

@if ($errors->any())
    <x-alert class="bg-red-500 text-white">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </x-alert>
@endif

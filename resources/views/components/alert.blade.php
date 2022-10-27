@props([])

<div {{ $attributes->merge([
    'class' => 'relative p-4 mb-4 rounded',
]) }}>
    {{ $slot }}
</div>

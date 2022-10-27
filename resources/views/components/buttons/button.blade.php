<button
    {{ $attributes->merge([
        'class' => 'rounded-md px-4 py-2 transition duration-500 ease select-none',
    ]) }}>
    {{ $slot }}
</button>

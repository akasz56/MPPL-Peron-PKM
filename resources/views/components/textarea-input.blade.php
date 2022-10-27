@props(['value', 'disabled' => false, 'rows' => 4, 'placeholder' => 'Text here'])

<textarea {{ $disabled ? 'disabled' : '' }} rows="{!! $rows !!}" placeholder="{!! $placeholder !!}"
    {!! $attributes->merge([
        'class' =>
            'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
    ]) !!}>{{ $value ?? $slot }}</textarea>

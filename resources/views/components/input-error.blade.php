@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'py-2 text-sm space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li class="text-red-600">{{ $message }}</li>
        @endforeach
    </ul>
@endif

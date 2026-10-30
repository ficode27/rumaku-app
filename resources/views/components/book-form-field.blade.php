@props([
    'label',
    'name',
    'type' => 'text',
    'placeholder' => '',
    'required' => false,
    'help' => null,
])

<div>
    <label for="{{ $name }}" class="mb-2 block text-sm font-medium text-heading">
        {{ $label }} @if ($required)<span class="text-red-500">*</span>@endif
    </label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        @required($required)
        {{ $attributes->merge(['class' => 'block w-full rounded-lg border border-default bg-white px-3 py-2.5 text-sm text-heading outline-none focus:border-brand focus:ring-2 focus:ring-brand/20']) }}
    >
    @if ($help)
        <p class="mt-1.5 text-xs text-body">{{ $help }}</p>
    @endif
</div>

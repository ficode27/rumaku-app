@props([
    'label' => 'Statistik',
    'color' => 'black',
    'icon' => 'device-analytics',
    'value' => 0,
])

@php
    $colors = [
        'blue' => 'bg-blue-100 text-blue-600',
        'violet' => 'bg-violet-100 text-violet-600',
        'green' => 'bg-green-100 text-green-600',
        'amber' => 'bg-amber-100 text-amber-600',
        'red' => 'bg-red-100 text-red-600',
    ];
@endphp

<div class="rounded-xl border border-default bg-white p-5 shadow-sm">
    <div class="flex items-center justify-between">
        <p class="text-sm font-medium text-body">{{ $label }}</p>
        <span
            class="rounded-lg px-2.5 py-1 text-xs font-bold uppercase {{ $colors[$color] ?? 'bg-slate-100 text-slate-600' }}"
            aria-hidden="true">
            <i class="ti ti-{{ $icon }} text-3xl"></i>
        </span>
    </div>
    <p class="mt-3 text-3xl font-bold text-heading">{{ number_format($value) }}</p>
</div>
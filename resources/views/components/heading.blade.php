@props([
    'title' => 'Title',
    'subtitle' => 'Subtitle',
])

<div class="flex flex-col gap-1">
    <h2 class="text-3xl font-bold tracking-tight text-heading">{{ $title }}</h2>
    <p class="text-neutral-500">{{ $subtitle }}</p>
</div>
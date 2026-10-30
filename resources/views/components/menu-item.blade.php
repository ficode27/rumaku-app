@props([
    'label' => 'Menu',
    'icon' => '',
    'link' => '#',
])
<li>
    <a href="{{ $link }}"
        class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
        <i class="ti ti-{{ $icon }} text-2xl"></i>
        <span class="ms-3">{{ $label }}</span>
    </a>
</li>
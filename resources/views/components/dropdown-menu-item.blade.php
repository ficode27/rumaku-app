@props([
    'label' => 'Dropdown Menu',
    'menus' => [],
    'icon' => '',
])

<li>
    <button type="button"
        class="flex items-center w-full justify-between px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group"
        aria-controls="dropdown-menu" data-collapse-toggle="dropdown-menu">
        <i class="ti ti-{{ $icon }} text-2xl"></i>
        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ $label }}</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 9-7 7-7-7" />
        </svg>
    </button>
    <ul id="dropdown-menu" class="hidden py-2 space-y-2">
        @foreach ($menus as $menu )
            <li>
                <a href="{{ $menu['link'] }}"
                    class="pl-10 flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">{{ $menu['label'] }}</a>
            </li>
        @endforeach
    </ul>
</li>
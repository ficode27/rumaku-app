@props([
    'book',
    'canManage' => false,
])

<article class="overflow-visible rounded-xl border border-default bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
    <div class="relative">
        <img class="h-64 w-full rounded-t-xl object-cover" src="{{ $book['cover'] }}" alt="Sampul {{ $book['title'] }}" loading="lazy">

        @php($menuId = 'book-menu-' . md5($book['title']))

        <div class="absolute right-3 top-3 z-20 inline-flex">
            <button type="button" class="inline-flex size-9 items-center justify-center rounded-lg bg-white/95 text-body shadow-sm hover:bg-white" aria-label="Aksi {{ $book['title'] }}" aria-haspopup="true" aria-expanded="false" data-dropdown-toggle="{{ $menuId }}" data-dropdown-placement="bottom-end">
                <i class="ti ti-dots-vertical text-xl"></i>
            </button>
            <div id="{{ $menuId }}" class="absolute right-0 top-full z-50 mt-2 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow-lg" role="menu">
                <a href="#" class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm text-body hover:bg-neutral-100" role="menuitem"><i class="ti ti-eye"></i>Lihat detail</a>
                @if ($canManage)
                    <a href="{{ route('catalog-edit') }}" class="flex w-full items-center gap-2 rounded-lg px-3 py-2 text-left text-sm text-body hover:bg-neutral-100" role="menuitem"><i class="ti ti-edit"></i>Edit buku</a>
                    <a href="#" class="flex w-full items-center gap-2 rounded-lg px-3 py-2 text-left text-sm text-body hover:bg-neutral-100" role="menuitem"><i class="ti ti-eye"></i>Detail buku</a>
                    <hr class="my-1 border-default">
                    <a href="#" class="flex w-full items-center gap-2 rounded-lg px-3 py-2 text-left text-sm text-red-600 hover:bg-red-50" role="menuitem"><i class="ti ti-trash"></i>Hapus buku</a>
                @else
                    <button href="#" class="flex w-full items-center gap-2 rounded-lg px-3 py-2 text-left text-sm text-body hover:bg-neutral-100" role="menuitem"><i class="ti ti-eye"></i>Detail buku</butaon>
                    <button href="#" class="flex w-full items-center gap-2 rounded-lg px-3 py-2 text-left text-sm text-brand hover:bg-neutral-100" role="menuitem"><i class="ti ti-bookmark"></i>Pinjam buku</a>
                @endif
            </div>
        </div>
    </div>

    <div class="p-5">
        <span class="rounded-full bg-brand-softer px-2.5 py-1 text-xs font-medium text-fg-brand-strong">{{ $book['category'] }}</span>
        <h3 class="mt-3 line-clamp-2 min-h-12 text-lg font-semibold text-heading">{{ $book['title'] }}</h3>
        <p class="mt-1 text-sm text-body">{{ $book['author'] }} · {{ $book['year'] }}</p>
        <div class="mt-4 flex items-center justify-between text-sm">
            <span class="{{ $book['available'] ? 'text-green-600' : 'text-red-600' }} font-medium">{{ $book['available'] ? 'Tersedia' : 'Dipinjam' }}</span>
            <span class="text-body">{{ $book['stock'] }} eksemplar</span>
        </div>
    </div>
</article>

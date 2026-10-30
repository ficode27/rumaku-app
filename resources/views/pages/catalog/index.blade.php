<?php

use Livewire\Component;

new class extends Component
{
    public string $search = '';
    public string $category = '';
    public int $perPage = 8;

    public array $books = [
        ['title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'category' => 'Novel', 'year' => 2005, 'stock' => 4, 'available' => true, 'cover' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=600'],
        ['title' => 'Bumi Manusia', 'author' => 'Pramoedya Ananta Toer', 'category' => 'Sejarah', 'year' => 1980, 'stock' => 2, 'available' => true, 'cover' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?w=600'],
        ['title' => 'Atomic Habits', 'author' => 'James Clear', 'category' => 'Pengembangan Diri', 'year' => 2018, 'stock' => 0, 'available' => false, 'cover' => 'https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=600'],
        ['title' => 'Filosofi Teras', 'author' => 'Henry Manampiring', 'category' => 'Filsafat', 'year' => 2018, 'stock' => 3, 'available' => true, 'cover' => 'https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=600'],
        ['title' => 'Sapiens', 'author' => 'Yuval Noah Harari', 'category' => 'Sejarah', 'year' => 2011, 'stock' => 1, 'available' => true, 'cover' => 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=600'],
        ['title' => 'The Psychology of Money', 'author' => 'Morgan Housel', 'category' => 'Bisnis', 'year' => 2020, 'stock' => 0, 'available' => false, 'cover' => 'https://images.unsplash.com/photo-1495446815901-a7297e633e8d?w=600'],
        ['title' => 'Negeri 5 Menara', 'author' => 'Ahmad Fuadi', 'category' => 'Novel', 'year' => 2009, 'stock' => 5, 'available' => true, 'cover' => 'https://images.unsplash.com/photo-1511108690759-009324a90311?w=600'],
        ['title' => 'Clean Code', 'author' => 'Robert C. Martin', 'category' => 'Teknologi', 'year' => 2008, 'stock' => 2, 'available' => true, 'cover' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=600'],
    ];

    public function getFilteredBooksProperty(): array
    {
        $search = strtolower(trim($this->search));

        return array_slice(array_values(array_filter($this->books, function (array $book) use ($search) {
            $matchesSearch = $search === '' || str_contains(strtolower($book['title'] . ' ' . $book['author']), $search);
            return $matchesSearch && ($this->category === '' || $book['category'] === $this->category);
        })), 0, $this->perPage);
    }

    public function loadMore(): void
    {
        $this->perPage += 8;
    }
};
?>

<div>
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-start">
        <x-heading title="Katalog Buku" subtitle="Temukan buku untuk kebutuhan belajar dan membaca." />
        <a href="{{ route('catalog-create') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand px-4 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-brand-strong">
            <i class="ti ti-plus"></i>
            Tambah Buku
        </a>
    </div>

    <div class="mt-6 flex flex-col gap-3 sm:flex-row">
        <input wire:model.live.debounce.300ms="search" type="search" placeholder="Cari judul atau penulis..." class="w-full rounded-lg border border-default bg-white px-4 py-2.5 text-sm focus:border-brand focus:ring-brand sm:max-w-md">
        <select wire:model.live="category" class="rounded-lg border border-default bg-white px-4 py-2.5 text-sm sm:w-56">
            <option value="">Semua kategori</option>
            @foreach (collect($books)->pluck('category')->unique()->sort() as $item)
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4" wire:loading.class="opacity-50">
        @forelse ($this->filteredBooks as $book)
            <x-product-card :book="$book" :can-manage="true" wire:key="book-{{ $book['title'] }}" />
        @empty
            <div class="col-span-full rounded-xl border border-dashed border-default p-12 text-center">
                <i class="ti ti-books text-4xl text-body"></i>
                <h3 class="mt-3 font-semibold text-heading">Buku tidak ditemukan</h3>
                <p class="mt-1 text-sm text-body">Coba ubah kata kunci atau kategori.</p>
            </div>
        @endforelse
    </div>

    @if (count($this->filteredBooks) >= $perPage && count($this->filteredBooks) < count($books))
        <div class="mt-8 text-center">
            <button wire:click="loadMore" wire:loading.attr="disabled" class="rounded-lg bg-brand px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-strong">Muat lebih banyak</button>
        </div>
    @endif
</div>

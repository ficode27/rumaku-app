<?php

use Livewire\Component;

new class extends Component
{
    public array $categories = ['Novel', 'Sejarah', 'Teknologi', 'Pendidikan', 'Pengembangan Diri'];
};
?>

<div>
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-start">
        <x-heading title="Ubah Data Buku" subtitle="Ubah data buku yang sudah ada dikatalog." />
        <a href="{{ route('catalog-index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-default bg-white px-4 py-2.5 text-sm font-medium text-body hover:bg-neutral-100">
            <i class="ti ti-arrow-left"></i>
            Kembali ke katalog
        </a>
    </div>

    <form class="mt-6 space-y-6">
        <section class="rounded-xl border border-default bg-white p-5 shadow-sm sm:p-6">
            <h3 class="text-lg font-semibold text-heading">Informasi Buku</h3>
            <p class="mt-1 text-sm text-body">Informasi dasar buku yang akan ditambahkan.</p>

            <div class="mt-5 grid gap-5 md:grid-cols-2">
                <x-book-form-field label="Judul Buku" name="title" placeholder="Contoh: Laskar Pelangi" required class="md:col-span-2" />
                <x-book-form-field label="Penulis" name="author" placeholder="Nama penulis" required />
                <x-book-form-field label="ISBN" name="isbn" placeholder="978-..." help="Opsional" />
                <div>
                    <label for="category" class="mb-2 block text-sm font-medium text-heading">Kategori <span class="text-red-500">*</span></label>
                    <select id="category" name="category" required class="block w-full rounded-lg border border-default bg-white px-3 py-2.5 text-sm text-heading outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
                        <option value="">Pilih kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <x-book-form-field label="Penerbit" name="publisher" placeholder="Nama penerbit" />
                <x-book-form-field label="Tahun Terbit" name="published_year" type="number" placeholder="2025" min="1000" max="{{ date('Y') }}" />
                <div>
                    <label for="language" class="mb-2 block text-sm font-medium text-heading">Bahasa</label>
                    <select id="language" name="language" class="block w-full rounded-lg border border-default bg-white px-3 py-2.5 text-sm text-heading outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
                        <option value="Indonesia">Indonesia</option>
                        <option value="Inggris">Inggris</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-default bg-white p-5 shadow-sm sm:p-6">
            <h3 class="text-lg font-semibold text-heading">Cover dan Deskripsi</h3>
            <div class="mt-5 grid gap-5 md:grid-cols-2">
                <div>
                    <label for="cover" class="mb-2 block text-sm font-medium text-heading">Cover Buku</label>
                    <input id="cover" name="cover" type="file" accept="image/png,image/jpeg,image/webp" class="block w-full rounded-lg border border-default bg-white text-sm text-body file:me-4 file:border-0 file:bg-neutral-100 file:px-4 file:py-2.5 file:font-medium">
                    <p class="mt-1.5 text-xs text-body">JPG, PNG, atau WebP. Maksimal 2 MB.</p>
                    <div id="cover-preview-wrapper" class="mt-4 hidden">
                        <img id="cover-preview" class="h-56 w-full rounded-lg border border-default object-contain" alt="Preview cover buku">
                        <button id="remove-cover" type="button" class="mt-2 text-sm font-medium text-red-600 hover:underline">Hapus gambar</button>
                    </div>
                </div>
                <div>
                    <label for="description" class="mb-2 block text-sm font-medium text-heading">Sinopsis</label>
                    <textarea id="description" name="description" rows="5" placeholder="Tulis sinopsis singkat buku..." class="block w-full rounded-lg border border-default bg-white px-3 py-2.5 text-sm text-heading outline-none focus:border-brand focus:ring-2 focus:ring-brand/20"></textarea>
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-default bg-white p-5 shadow-sm sm:p-6">
            <h3 class="text-lg font-semibold text-heading">Informasi Koleksi</h3>
            <div class="mt-5 grid gap-5 md:grid-cols-3">
                <x-book-form-field label="Jumlah Eksemplar" name="stock" type="number" placeholder="1" min="0" required />
                <x-book-form-field label="Kode Inventaris" name="inventory_code" placeholder="BK-0001" />
                <x-book-form-field label="Lokasi Rak" name="shelf" placeholder="Rak A-01" />
                <div>
                    <label for="condition" class="mb-2 block text-sm font-medium text-heading">Kondisi</label>
                    <select id="condition" name="condition" class="block w-full rounded-lg border border-default bg-white px-3 py-2.5 text-sm text-heading outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
                        <option>Baik</option>
                        <option>Rusak ringan</option>
                        <option>Rusak berat</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="mb-2 block text-sm font-medium text-heading">Status</label>
                    <select id="status" name="status" class="block w-full rounded-lg border border-default bg-white px-3 py-2.5 text-sm text-heading outline-none focus:border-brand focus:ring-2 focus:ring-brand/20">
                        <option>Aktif</option>
                        <option>Arsip</option>
                    </select>
                </div>
            </div>
        </section>

        <div class="flex justify-end gap-3">
            <a href="{{ route('catalog-index') }}" class="rounded-lg border border-default bg-white px-4 py-2.5 text-sm font-medium text-body hover:bg-neutral-100">Batal</a>
            <button type="submit" class="rounded-lg bg-brand px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-strong">Simpan Buku</button>
        </div>
    </form>

    <script>
        const coverInput = document.getElementById('cover');
        const previewWrapper = document.getElementById('cover-preview-wrapper');
        const preview = document.getElementById('cover-preview');
        const removeCover = document.getElementById('remove-cover');

        coverInput.addEventListener('change', () => {
            const file = coverInput.files[0];
            if (!file) return;

            preview.src = URL.createObjectURL(file);
            previewWrapper.classList.remove('hidden');
        });

        removeCover.addEventListener('click', () => {
            coverInput.value = '';
            preview.src = '';
            previewWrapper.classList.add('hidden');
        });
    </script>
</div>

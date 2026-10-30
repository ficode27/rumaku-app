<?php

use Livewire\Component;

new class extends Component {

    public function getMasterDataItems(): array
    {
        return [
            ['label' => 'Pengguna', 'link' => '#'],
            ['label' => 'Petugas', 'link' => '#'],
            ['label' => 'Anggota', 'link' => '#'],
        ];
    }

    public function getStatsProperty(): array
    {
        return [
            ['label' => 'Total Pengguna', 'value' => 0, 'icon' => 'users', 'color' => 'amber'],
            ['label' => 'Pegawai Perpustakaan', 'value' => 0, 'icon' => 'briefcase', 'color' => 'violet'],
            ['label' => 'Anggota Perpustakaan', 'value' => 0, 'icon' => 'users-group', 'color' => 'green'],
            ['label' => 'Total Buku', 'value' => 0, 'icon' => 'book', 'color' => 'blue'],
        ];
    }
};
?>

<div>
    <x-sidebar>
        <x-menu-item label="Dasbor" link="{{ route('dashboard') }}" icon="dashboard" />
        <x-menu-item label="Katalog" link="{{ route('catalog-index') }}" icon="books" />
        <x-dropdown-menu-item label="Master Data" icon="database" :menus="$this->getMasterDataItems()"/>
        <x-menu-item label="Wakaf Buku" link="#" icon="heart-handshake" />
    </x-sidebar>

    <x-heading title="Dasbor" subtitle="Selamat Datang, Superadmin" />

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4 mt-6">
        @foreach ($this->getStatsProperty() as $stat)
            <x-stat-card label="{{ $stat['label'] }}" value="{{ $stat['value'] }}" icon="{{ $stat['icon'] }}"
                color="{{ $stat['color'] }}" />
        @endforeach
    </div>
</div>
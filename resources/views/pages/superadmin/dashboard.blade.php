<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\User;
use Livewire\Component;

new
#[Title('Dasbor')]
class extends Component
{
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
   <x-heading title="Dasbor" subtitle="Selamat Datang, Superadmin" />

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4 mt-6">
        @foreach ($this->stats as $stat)
           <x-stat-card label="{{ $stat['label'] }}" value="{{ $stat['value'] }}" icon="{{ $stat['icon'] }}" color="{{ $stat['color'] }}" />
        @endforeach
    </div>
</div>
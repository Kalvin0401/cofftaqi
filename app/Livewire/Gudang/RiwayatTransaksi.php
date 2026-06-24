<?php

namespace App\Livewire\Gudang;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\StokMasuk;
use App\Models\StokKeluar;

class RiwayatTransaksi extends Component
{
    use WithPagination;

    public $filterTipe = null;
    public $search = '';
    public $perPage = 20;
    // 🔥 WAJIB ADA
    public $tanggal_awal;
    public $tanggal_akhir;

    public function mount()
    {
        $this->tanggal_awal = now()->startOfMonth()->format('Y-m-d');
        $this->tanggal_akhir = now()->format('Y-m-d');
    }

            public function setFilter($tipe)
        {
            $this->resetPage();

            $this->filterTipe = $tipe;
        }

        public function updatingSearch()
        {
            $this->resetPage();
        }

        public function updatingTanggalAwal()
        {
            $this->resetPage();
        }

        public function updatingTanggalAkhir()
        {
            $this->resetPage();
        }
        public function render()
        {
    $data = collect();

    if (!$this->filterTipe || $this->filterTipe === 'Masuk') {

        $stokMasuk = StokMasuk::with('kopi')
            ->whereDate('tanggal', '>=', $this->tanggal_awal)
            ->whereDate('tanggal', '<=', $this->tanggal_akhir)

            ->where(function ($query) {

                $query->whereHas('kopi', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                })

                ->orWhere('sumber_nama', 'like', '%' . $this->search . '%')

                ->orWhere('keterangan', 'like', '%' . $this->search . '%')

                ->orWhere('tanggal', 'like', '%' . $this->search . '%');
            })

            ->get()

            ->map(fn($item) => [
                'tanggal' => $item->tanggal,
                'kopi' => $item->kopi->nama,
                'jumlah' => $item->jumlah,
                'satuan' => $item->kopi->satuan,
                'harga_perkilo' => $item->harga_perkilo,
                'oleh' => $item->sumber_nama
                    ? $item->sumber_type . ' - ' . $item->sumber_nama
                    : $item->sumber_type,
                'keterangan' => $item->keterangan,
                'tipe' => 'Masuk',
            ]);

        $data = $data->merge($stokMasuk);
    }

    if (!$this->filterTipe || $this->filterTipe === 'Keluar') {

        $stokKeluar = StokKeluar::with('kopi')
            ->whereDate('tanggal', '>=', $this->tanggal_awal)
            ->whereDate('tanggal', '<=', $this->tanggal_akhir)

            ->where(function ($query) {

                $query->whereHas('kopi', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                })

                ->orWhere('tujuan', 'like', '%' . $this->search . '%')

                ->orWhere('keterangan', 'like', '%' . $this->search . '%')

                ->orWhere('tanggal', 'like', '%' . $this->search . '%');
            })

            ->get()

            ->map(fn($item) => [
                'tanggal' => $item->tanggal,
                'kopi' => $item->kopi->nama,
                'jumlah' => $item->jumlah,
                'satuan' => $item->kopi->satuan,
                'harga_perkilo' => $item->harga_perkilo,
                'oleh' => $item->tujuan ?? '-',
                'keterangan' => $item->keterangan,
                'tipe' => 'Keluar',
            ]);

        $data = $data->merge($stokKeluar);
    }

    $data = $data->sortByDesc('tanggal')->values();

    $currentPage = LengthAwarePaginator::resolveCurrentPage();

    $items = $data->slice(
        ($currentPage - 1) * $this->perPage,
        $this->perPage
    )->values();

    $paginatedData = new LengthAwarePaginator(
        $items,
        $data->count(),
        $this->perPage,
        $currentPage,
        [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]
    );

    return view('livewire.gudang.riwayat-transaksi', [
        'data' => $paginatedData
    ]);
    }
}
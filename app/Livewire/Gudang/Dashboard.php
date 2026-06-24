<?php

namespace App\Livewire\Gudang;

use Livewire\Component;
use App\Models\Kopi;
use App\Models\StokMasuk;
use App\Models\StokKeluar;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $totalProduk;
    public $stokMasukHariIni;
    public $stokKeluarHariIni;
    public $stokKritis;
    public $transaksiTerakhir = [];
    public $produkKritis = [];
    public $stokTersedia;

    public function mount()
    {
        // AMBIL SEMUA KOPI AKTIF
        $kopi = Kopi::aktif()->get();

        // TOTAL PRODUK
        $this->totalProduk = $kopi->count();
        //STOK TERSEDIA
        $this->stokTersedia = $kopi->sum('stok');

        // STOK MASUK HARI INI
        $this->stokMasukHariIni = StokMasuk::whereDate(
            'tanggal',
            Carbon::today()
        )->sum('jumlah');

        // STOK KELUAR HARI INI
        $this->stokKeluarHariIni = StokKeluar::whereDate(
            'tanggal',
            Carbon::today()
        )->sum('jumlah');

        // JUMLAH PRODUK WARNING STOK
$this->stokKritis = $kopi
    ->filter(function ($item) {

        return in_array($item->status_stok, [
            'habis',
            'kritis',
            'menipis'
        ]);

    })
    ->count();
        // PRODUK WARNING STOK
$this->produkKritis = $kopi
    ->filter(function ($item) {

        return in_array($item->status_stok, [
            'habis',
            'kritis',
            'menipis'
        ]);

    })

    ->sortBy(function ($item) {

        return match ($item->status_stok) {

            'habis' => 1,
            'kritis' => 2,
            'menipis' => 3,
            default => 4,
        };

    })

    ->take(5)
    ->values();
        // TRANSAKSI TERAKHIR
$masuk = StokMasuk::with('kopi')
    ->latest('tanggal')
    ->take(5)
    ->get()
    ->map(fn ($item) => [
        'tanggal' => \Carbon\Carbon::parse($item->tanggal)
            ->format('d M Y • H:i'),
        'tanggal_sort'   => $item->tanggal,
        'produk'         => $item->kopi->nama,
        'jenis'          => 'Masuk',
        'jumlah'         => $item->jumlah,
        'harga_perkilo'  => $item->harga_perkilo,
    ]);

$keluar = StokKeluar::with('kopi')
    ->latest('tanggal')
    ->take(5)
    ->get()
    ->map(fn ($item) => [
        'tanggal' => \Carbon\Carbon::parse($item->tanggal)
            ->format('d M Y • H:i'),
        'tanggal_sort'   => $item->tanggal,
        'produk'         => $item->kopi->nama,
        'jenis'          => 'Keluar',
        'jumlah'         => $item->jumlah,
        'harga_perkilo'  => $item->harga_perkilo,
    ]);

$this->transaksiTerakhir = $masuk
    ->merge($keluar)
    ->sortByDesc('tanggal_sort')
    ->take(5)
    ->values();

    }

    public function render()
    {
        return view('livewire.gudang.dashboard');
    }
}

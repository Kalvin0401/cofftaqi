<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Kopi;
use App\Models\StokMasuk;
use App\Models\StokKeluar;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $totalProduk;
    public $totalStokMasuk;
    public $totalStokKeluar;
    public $totalSupplier;
    public $stokTersedia;

    public $riwayatTransaksi = [];

    public $chartStokMasuk = [];
    public $chartStokKeluar = [];
    public $chartLabels = [];

    public $produkTerlaris;

    public $pieLabels = [];
    public $pieData = [];

    public $distribusiStok = [];

    public $analisisMasuk;
    public $analisisKeluar;
    public $pesanMasuk;
public $pesanKeluar;
    public $alertStok = [];
public $tahun;
public $daftarTahun = [];

public function loadChartData()
{
    $stokMasuk = StokMasuk::select(
        DB::raw('MONTH(tanggal) as bulan'),
        DB::raw('SUM(jumlah) as total')
    )
        ->whereYear('tanggal', $this->tahun)
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

    $stokKeluar = StokKeluar::select(
        DB::raw('MONTH(tanggal) as bulan'),
        DB::raw('SUM(jumlah) as total')
    )
        ->whereYear('tanggal', $this->tahun)
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

    $this->chartLabels = [
        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
        'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
    ];

    $dataMasuk = array_fill(0, 12, 0);
    $dataKeluar = array_fill(0, 12, 0);

    foreach ($stokMasuk as $item) {

        $dataMasuk[$item->bulan - 1] = $item->total;

    }

    foreach ($stokKeluar as $item) {

        $dataKeluar[$item->bulan - 1] = $item->total;

    }

    $this->chartStokMasuk = $dataMasuk;

    $this->chartStokKeluar = $dataKeluar;
}
    public function mount()
    {
        $this->tahun = request()->tahun ?? now()->year;

$tahunMasuk = StokMasuk::selectRaw('YEAR(tanggal) as tahun')
    ->distinct()
    ->pluck('tahun')
    ->toArray();

$tahunKeluar = StokKeluar::selectRaw('YEAR(tanggal) as tahun')
    ->distinct()
    ->pluck('tahun')
    ->toArray();

$this->daftarTahun = collect(
    array_merge($tahunMasuk, $tahunKeluar)
)
->unique()
->sortDesc()
->values()
->toArray();
        // =========================
        // TOTAL DASHBOARD
        // =========================

        $this->totalProduk = Kopi::count();

        $this->totalStokMasuk = StokMasuk::sum('jumlah');

        $this->totalStokKeluar = StokKeluar::sum('jumlah');

        $this->totalSupplier = Supplier::count();

        $this->stokTersedia =
            $this->totalStokMasuk - $this->totalStokKeluar;

        $this->loadChartData();

        // =========================
        // PRODUK TERLARIS
        // =========================

        $this->produkTerlaris = StokKeluar::select(
            'kopi_id',
            DB::raw('SUM(jumlah) as total_keluar')
        )
            ->with('kopi')
            ->groupBy('kopi_id')
            ->orderByDesc('total_keluar')
            ->first();

        // =========================
        // DISTRIBUSI STOK
        // =========================

        $warna = [
            '#059669',
            '#fbbf24',
            '#3b82f6',
            '#ef4444',
            '#8b5cf6',
            '#14b8a6',
        ];

        $kopi = Kopi::all();

        foreach ($kopi as $index => $item) {

            $stokMasukKopi = StokMasuk::where('kopi_id', $item->id)
                ->sum('jumlah');

            $stokKeluarKopi = StokKeluar::where('kopi_id', $item->id)
                ->sum('jumlah');

            $stok = $stokMasukKopi - $stokKeluarKopi;

            if ($stok > 0) {

                $this->distribusiStok[] = [
                    'nama' => $item->nama,
                    'stok' => $stok,
                    'warna' => $warna[$index % count($warna)],
                ];
            }
        }

        $this->pieLabels = collect($this->distribusiStok)
            ->pluck('nama')
            ->toArray();

        $this->pieData = collect($this->distribusiStok)
            ->pluck('stok')
            ->toArray();

        // =========================
        // ANALISIS BULANAN
        // =========================

        $sekarang = now();

        $bulanSekarang = $sekarang->month;
        $tahunSekarang = $sekarang->year;

        $bulanLaluDate = $sekarang->copy()->subMonthNoOverflow();

        $bulanLalu = $bulanLaluDate->month;
        $tahunLalu = $bulanLaluDate->year;

        // =========================
        // STOK MASUK
        // =========================

        $masukSekarang = StokMasuk::whereMonth('tanggal', $bulanSekarang)
            ->whereYear('tanggal', $tahunSekarang)
            ->sum('jumlah');

        $masukLalu = StokMasuk::whereMonth('tanggal', $bulanLalu)
            ->whereYear('tanggal', $tahunLalu)
            ->sum('jumlah');

        // =========================
        // STOK KELUAR
        // =========================

        $keluarSekarang = StokKeluar::whereMonth('tanggal', $bulanSekarang)
            ->whereYear('tanggal', $tahunSekarang)
            ->sum('jumlah');

        $keluarLalu = StokKeluar::whereMonth('tanggal', $bulanLalu)
            ->whereYear('tanggal', $tahunLalu)
            ->sum('jumlah');

            
        // =========================
        // HITUNG PERSEN AMAN
        // =========================

        if ($masukLalu > 0 && $masukSekarang > 0) {

                $persenMasuk =
                    (($masukSekarang - $masukLalu) / $masukLalu) * 100;

            } else {

                $persenMasuk = null;
            }

            if ($keluarLalu > 0 && $keluarSekarang > 0) {

                $persenKeluar =
                    (($keluarSekarang - $keluarLalu) / $keluarLalu) * 100;

            } else {

                $persenKeluar = null;
            }

        // 

        if ($persenMasuk !== null) {
    $persenMasuk = round($persenMasuk, 1);
}

if ($persenKeluar !== null) {
    $persenKeluar = round($persenKeluar, 1);
}

        // =========================
        // SIMPAN ANALISIS
        // =========================

       $this->analisisMasuk = [
            'persen' => $persenMasuk,
            'total' => $masukSekarang,
            'naik' => $persenMasuk !== null
                ? $persenMasuk >= 0
                : null,
        ];

        $this->analisisKeluar = [
            'persen' => $persenKeluar,
            'total' => $keluarSekarang,
            'naik' => $persenKeluar !== null
                ? $persenKeluar >= 0
                : null,
        ];
       if ($masukLalu == 0 && $masukSekarang == 0) {

    $this->pesanMasuk =
        'Belum ada transaksi stok masuk pada periode yang dibandingkan.';

} elseif ($masukLalu > 0 && $masukSekarang == 0) {

    $this->pesanMasuk =
        'Belum ada transaksi stok masuk pada bulan ini.';

} elseif ($masukLalu == 0 && $masukSekarang > 0) {

    $this->pesanMasuk =
        'Aktivitas stok masuk mulai tercatat pada bulan ini.';

} elseif ($masukSekarang > $masukLalu) {

    $this->pesanMasuk =
        'Stok masuk bulan ini meningkat dibanding bulan sebelumnya.';

} elseif ($masukSekarang < $masukLalu) {

    $this->pesanMasuk =
        'Stok masuk bulan ini menurun dibanding bulan sebelumnya.';

} else {

    $this->pesanMasuk =
        'Stok masuk bulan ini stabil dibanding bulan sebelumnya.';
}

if ($keluarLalu == 0 && $keluarSekarang == 0) {

    $this->pesanKeluar =
        'Belum ada transaksi stok keluar pada periode yang dibandingkan.';

} elseif ($keluarLalu > 0 && $keluarSekarang == 0) {

    $this->pesanKeluar =
        'Belum ada transaksi stok keluar pada bulan ini.';

} elseif ($keluarLalu == 0 && $keluarSekarang > 0) {

    $this->pesanKeluar =
        'Aktivitas stok keluar mulai tercatat pada bulan ini.';

} elseif ($keluarSekarang > $keluarLalu) {

    $this->pesanKeluar =
        'Stok keluar bulan ini lebih tinggi dibanding bulan sebelumnya.';

} elseif ($keluarSekarang < $keluarLalu) {

    $this->pesanKeluar =
        'Stok keluar bulan ini menurun dibanding bulan sebelumnya.';

} else {

    $this->pesanKeluar =
        'Stok keluar bulan ini stabil dibanding bulan sebelumnya.';
}
        // =========================
        // RIWAYAT TRANSAKSI
        // =========================

        $masuk = StokMasuk::with('kopi')
            
            ->orderBy('tanggal', 'desc')
            ->take(7)
            ->get();

        $keluar = StokKeluar::with('kopi')
            
            ->orderBy('tanggal', 'desc')
            ->take(7)
            ->get();

        $this->riwayatTransaksi = $masuk->map(fn($item) => [
            'tanggal_raw' => $item->tanggal,
            'produk' => $item->kopi->nama,
            'jenis' => 'Masuk',
            'jumlah' => $item->jumlah,
            
        ])->merge(
            $keluar->map(fn($item) => [
                'tanggal_raw' => $item->tanggal,
                'produk' => $item->kopi->nama,
                'jenis' => 'Keluar',
                'jumlah' => $item->jumlah,
                
            ])
        )
        ->sortByDesc('tanggal_raw')
        ->map(function ($item) {

            $item['tanggal'] = \Carbon\Carbon::parse(
                $item['tanggal_raw']
            )->translatedFormat('d M Y • H:i');

            unset($item['tanggal_raw']);

            return $item;

        })
        ->values()
        ->take(7)
        ->toArray();
        // =========================
        // ALERT STOK
        // =========================

        foreach ($kopi as $item) {

        // TOTAL STOK MASUK
        $stokMasukKopi = StokMasuk::where('kopi_id', $item->id)
            ->sum('jumlah');

        // TOTAL STOK KELUAR
        $stokKeluarKopi = StokKeluar::where('kopi_id', $item->id)
            ->sum('jumlah');

        // SISA STOK
        $stok = $stokMasukKopi - $stokKeluarKopi;

       // STATUS STOK
if ($stok == 0) {

    $status = 'Habis';
    $warna = 'gray';

} elseif ($stok < $item->stok_minimum) {

    $status = 'Kritis';
    $warna = 'red';

} elseif ($stok <= ($item->stok_minimum + 50)) {

    $status = 'Menipis';
    $warna = 'amber';

} else {

    $status = 'Aman';
    $warna = 'emerald';
}

        // SIMPAN HANYA JIKA BUKAN AMAN
if ($status !== 'Aman') {

    $this->alertStok[] = [
        'nama' => $item->nama,
        'stok' => $stok,
        'status' => $status,
        'warna' => $warna,
    ];
}
    }

    // URUTKAN STOK TERKECIL
    $this->alertStok = collect($this->alertStok)
        ->sortBy('stok')
        ->values()
        ->toArray();
        }


    public function render()
    {
        return view('livewire.admin.dashboard');
    }
    
}
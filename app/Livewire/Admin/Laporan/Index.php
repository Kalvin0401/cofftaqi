<?php

namespace App\Livewire\Admin\Laporan;

use Livewire\Component;
use App\Models\Kopi;
use PDF;

class Index extends Component
{
    public $tanggal_awal;
    public $tanggal_akhir;

    public function mount()
    {
        $this->tanggal_awal = now()->startOfMonth()->format('Y-m-d');
        $this->tanggal_akhir = now()->format('Y-m-d');
    }

    public function generate()
    {
    $kopis = Kopi::with([
        'stokMasuk' => function ($q) {
            $q->whereDate('tanggal', '>=', $this->tanggal_awal)
            ->whereDate('tanggal', '<=', $this->tanggal_akhir);
        },
        'stokKeluar' => function ($q) {
            $q->whereDate('tanggal', '>=', $this->tanggal_awal)
            ->whereDate('tanggal', '<=', $this->tanggal_akhir);
        }
    ])->get();

        $pdf = PDF::loadView('livewire.admin.laporan.pdf', [
            'kopis' => $kopis,
            'tanggal_awal' => $this->tanggal_awal,
            'tanggal_akhir' => $this->tanggal_akhir,
        ]);

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'laporan_kopi_' . now()->format('Ymd_His') . '.pdf'
        );
    }

    public function render()
    {
        return view('livewire.admin.laporan.index');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StokMasuk;
use App\Models\StokKeluar;

class Kopi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'jenis',
        'asal',
        'satuan',
        'stok_minimum',
        'status',
    ];

    protected $casts = [
        'stok_minimum' => 'integer',
        'status' => 'boolean',
    ];

    protected $appends = [
        'stok',
        'status_stok',
    ];

    /* ================= RELATIONSHIP ================= */

public function stokMasuk()
{
    return $this->hasMany(StokMasuk::class, 'kopi_id', 'id');
}

public function stokKeluar()
{
    return $this->hasMany(StokKeluar::class, 'kopi_id', 'id');
}

    /* ================= ACCESSOR ================= */

    // HITUNG STOK REAL (MASUK - KELUAR)
public function getStokAttribute(): int
{
    $masuk = $this->stokMasuk->sum('jumlah');
    $keluar = $this->stokKeluar->sum('jumlah');

    return max(0, $masuk - $keluar);
}

   // STATUS STOK
public function getStatusStokAttribute(): string
{
    if ($this->stok === 0) {
        return 'habis';
    }

    if ($this->stok < $this->stok_minimum) {
        return 'kritis';
    }

    if ($this->stok <= ($this->stok_minimum + 50)) {
        return 'menipis';
    }

    return 'aman';
}

    /* ================= HELPER ================= */

    public function isStokKritis(): bool
    {
        return $this->stok < $this->stok_minimum;
    }

    /* ================= QUERY SCOPE ================= */

    public function scopeAktif($query)
    {
        return $query->where('status', true);
    }
}

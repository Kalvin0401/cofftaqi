<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class StokMasuk extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi
     */
    protected $fillable = [
        'kopi_id',
        'tanggal',
        'jumlah',
        'harga_perkilo',
        'total',
        'keterangan',
        'supplier_id',
        'sumber_type',
        'sumber_nama',
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'tanggal' => 'datetime',
        'jumlah' => 'integer',
    ];

    /* RELATIONSHIP*/

    public function kopi()
    {
        return $this->belongsTo(Kopi::class);
    }

    /* MODEL EVENT (SAFETY)*/

    protected static function booted()
    {
        static::creating(function (self $stokMasuk) {
            if ($stokMasuk->jumlah <= 0) {
                throw new \Exception('Jumlah stok masuk harus lebih dari 0');
            }
        });
    }

    /* QUERY SCOPE*/

    public function scopePeriode(Builder $query, $from, $to)
    {
        return $query->whereBetween('tanggal', [$from, $to]);
    }

    public function scopeHariIni(Builder $query)
    {
        return $query->whereDate('tanggal', now());
    }

    // relasi
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class StokKeluar extends Model
{
    use HasFactory;

    /** Kolom yang boleh diisi */
    protected $fillable = [
        'kopi_id',
        'tanggal',
        'jumlah',
        'harga_perkilo',
        'total',
        'tujuan', 
        'keterangan',
    ];

    /** Casting tipe data */
    protected $casts = [
        'tanggal' => 'datetime',
        'jumlah'  => 'integer',
    ];

    /* RELATIONSHIP */

    public function kopi()
    {
        return $this->belongsTo(Kopi::class);
    }

    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class);
    }

    /* MODEL EVENT (SAFETY) */
   
}

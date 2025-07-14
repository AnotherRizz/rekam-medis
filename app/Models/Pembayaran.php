<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_bayar', 'pemeriksaan_id', 'biaya_periksa', 'biaya_obat', 'tgl_bayar'
    ];

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }
}
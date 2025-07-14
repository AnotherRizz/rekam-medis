<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

   protected $fillable = [
    'pasien_id', 'no_periksa', 'keluhan', 'riwayat_penyakit',
    'bb', 'tb', 'tensi_darah', 'tgl_periksa',
    'obat_id', 'jumlah'
];


    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
    public function obat()
{
    return $this->belongsTo(Obat::class);
}
public function pembayaran()
{
    return $this->hasOne(Pembayaran::class);
}


}
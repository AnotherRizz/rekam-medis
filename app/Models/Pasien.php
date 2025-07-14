<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = ['no_pasien', 'nama', 'alamat', 'tgl_lahir', 'no_tlp'];

    public function pemeriksaans()
{
    return $this->hasMany(Pemeriksaan::class);
}

}
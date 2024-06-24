<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien'; // Tambahkan baris ini

    protected $fillable = ['nama', 'alamat', 'nomor_telepon'];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
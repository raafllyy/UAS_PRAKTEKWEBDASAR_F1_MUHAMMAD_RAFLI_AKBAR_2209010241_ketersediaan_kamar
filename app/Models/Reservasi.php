<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    
    protected $fillable = ['kamar_id', 'pasien_id', 'tanggal_masuk', 'tanggal_keluar', 'status'];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
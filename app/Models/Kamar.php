<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar'; 

    protected $fillable = ['nomor_kamar', 'level_kamar_id', 'status'];

    public function levelKamar()
    {
        return $this->belongsTo(LevelKamar::class);
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
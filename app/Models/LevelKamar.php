<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelKamar extends Model
{
    protected $table = 'level_kamar'; 

    protected $fillable = ['nama', 'deskripsi'];

    public function kamar()
    {
        return $this->hasMany(Kamar::class);
    }

    public function edit(Kamar $kamar)
{
    return view('kamar.edit', compact('kamar'));
}
}
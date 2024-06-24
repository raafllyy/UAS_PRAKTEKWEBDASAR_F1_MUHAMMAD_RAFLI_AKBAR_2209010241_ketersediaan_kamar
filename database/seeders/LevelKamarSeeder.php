<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LevelKamar;

class LevelKamarSeeder extends Seeder
{
    public function run()
    {
        LevelKamar::create(['nama' => 'Kelas 1', 'deskripsi' => 'Kamar VIP dengan fasilitas lengkap']);
        LevelKamar::create(['nama' => 'Kelas 2', 'deskripsi' => 'Kamar semi-private dengan fasilitas standar']);
        LevelKamar::create(['nama' => 'Kelas 3', 'deskripsi' => 'Kamar umum dengan fasilitas dasar']);
    }
}
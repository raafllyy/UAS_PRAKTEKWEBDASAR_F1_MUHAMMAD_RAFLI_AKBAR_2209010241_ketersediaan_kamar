<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Models\LevelKamar;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        return view('kamar.index', compact('kamar'));
    }

    public function create()
    {
        $levelKamar = LevelKamar::all(); 
        return view('kamar.create', compact('levelKamar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required|unique:kamar',
            'level_kamar_id' => 'required|exists:level_kamar,id',
            'status' => 'required|in:tersedia,tidak tersedia',
        ]);

        Kamar::create($request->all());

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan');
    }

    public function edit(Kamar $kamar)
    {
        $levelKamar = LevelKamar::all();
        return view('kamar.edit', compact('kamar', 'levelKamar'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nomor_kamar' => 'required|unique:kamar,nomor_kamar,' . $kamar->id,
            'level_kamar_id' => 'required|exists:level_kamar,id',
            'status' => 'required|in:tersedia,tidak tersedia',
        ]);

        $kamar->update($request->all());

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diperbarui');
    }

    public function show(Kamar $kamar)
    {
        $reservasi = $kamar->reservasi()->latest()->first();
        return view('kamar.show', compact('kamar', 'reservasi'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\LevelKamar;
use Illuminate\Http\Request;

class LevelKamarController extends Controller
{
    public function index()
    {
        $levelKamar = LevelKamar::all();
        return view('level_kamar.index', compact('levelKamar'));
    }

    public function create()
    {
        return view('level_kamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:level_kamar',
            'deskripsi' => 'required|string',

        ]);

        LevelKamar::create($request->all());

        return redirect()->route('level_kamar.index')->with('success', 'Level kamar berhasil ditambahkan');
    }

    public function show(LevelKamar $levelKamar)
    {
        return view('level_kamar.show', compact('levelKamar'));
    }

    public function edit(LevelKamar $levelKamar)
    {
        return view('level_kamar.edit', compact('levelKamar'));
    }

    public function update(Request $request, LevelKamar $levelKamar)
    {
        $request->validate([
            'nama' => 'required|unique:level_kamar',
            'deskripsi' => 'required|string',

        ]);

        $levelKamar->update($request->all());

        return redirect()->route('level_kamar.index')->with('success', 'Level kamar berhasil diperbarui');
    }

    public function destroy(LevelKamar $levelKamar)
    {
        $levelKamar->delete();

        return redirect()->route('level_kamar.index')->with('success', 'Level kamar berhasil dihapus');
    }
}
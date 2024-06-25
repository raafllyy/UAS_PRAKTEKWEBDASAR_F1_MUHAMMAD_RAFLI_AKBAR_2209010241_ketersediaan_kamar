<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Kamar;
use App\Models\Pasien;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::with(['kamar', 'pasien'])->get();
        return view('reservasi.index', compact('reservasi'));
    }

    public function create()
    {
        $kamar = Kamar::where('status', 'tersedia')->get();
        $pasien = Pasien::all();
        return view('reservasi.create', compact('kamar', 'pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'kamar_id' => 'required|exists:kamar,id',
            'tanggal_masuk' => 'required|date',
        ]);

        $reservasi = Reservasi::create($request->all());

        // Update status kamar menjadi tidak tersedia
        $reservasi->kamar->update(['status' => 'tidak tersedia']);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil ditambahkan');
    }

    public function show(Reservasi $reservasi)
    {
        return view('reservasi.show', compact('reservasi'));
    }

    public function edit(Reservasi $reservasi)
    {
        $kamar = Kamar::all();
        $pasien = Pasien::all();
        return view('reservasi.edit', compact('reservasi', 'kamar', 'pasien'));
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'kamar_id' => 'required|exists:kamar,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date',
            'tanggal_check_out' => 'nullable|date',
            'status' => 'required|in:aktif,selesai',
        ]);

        // Jika kamar berubah, update status kamar lama dan baru
        if ($reservasi->kamar_id != $request->kamar_id) {
            $reservasi->kamar->update(['status' => 'tersedia']);
            Kamar::find($request->kamar_id)->update(['status' => 'tidak tersedia']);
        }

        $reservasi->update($request->all());

        if ($request->status == 'selesai') {
            $reservasi->kamar->update(['status' => 'tersedia']);
        }

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diperbarui');
    }

    public function destroy(Reservasi $reservasi)
    {
        $reservasi->kamar->update(['status' => 'tersedia']);
        $reservasi->delete();

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dihapus');
    }

    public function checkOut(Reservasi $reservasi)
    {
        $reservasi->status = 'selesai';
        $reservasi->tanggal_keluar= now();
        $reservasi->save();

        // Update status kamar menjadi tersedia
        $kamar = $reservasi->kamar;
        $kamar->status = 'tersedia';
        $kamar->save();

        return redirect()->route('reservasi.index')
            ->with('success', 'Check-out berhasil.');
    }
    
}
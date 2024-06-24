@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kamar</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nomor Kamar: {{ $kamar->nomor_kamar }}</h5>
            <p class="card-text">Level Kamar: {{ $kamar->levelKamar->nama }}</p>
            <p class="card-text">Status: {{ ucfirst($kamar->status) }}</p>
            @if($reservasi)
                <h5>Reservasi Terakhir:</h5>
                <p>Pasien: {{ $reservasi->pasien->nama }}</p>
                <p>Tanggal Masuk: {{ $reservasi->tanggal_masuk }}</p>
                <p>Tanggal Keluar: {{ $reservasi->tanggal_keluar ?: 'Belum keluar' }}</p>
            @endif
        </div>
    </div>
    <a href="{{ route('kamar.edit', $kamar->id) }}" class="btn btn-primary mt-3">Edit</a>
    <a href="{{ route('kamar.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
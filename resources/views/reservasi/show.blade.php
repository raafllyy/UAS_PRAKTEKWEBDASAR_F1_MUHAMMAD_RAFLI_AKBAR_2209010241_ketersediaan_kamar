@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Reservasi</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reservasi #{{ $reservasi->id }}</h5>
            <p class="card-text"><strong>Nomor Kamar:</strong> {{ $reservasi->kamar->nomor_kamar }}</p>
            <p class="card-text"><strong>Level Kamar:</strong> {{ $reservasi->kamar->levelKamar->nama }}</p>
            <p class="card-text"><strong>Nama Pasien:</strong> {{ $reservasi->pasien->nama }}</p>
            <p class="card-text"><strong>Tanggal Masuk:</strong> {{ $reservasi->tanggal_masuk }}</p>
            <p class="card-text"><strong>Tanggal Keluar:</strong> {{ $reservasi->tanggal_keluar ?? 'Belum keluar' }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $reservasi->status }}</p>
        </div>
    </div>
    <a href="{{ route('reservasi.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
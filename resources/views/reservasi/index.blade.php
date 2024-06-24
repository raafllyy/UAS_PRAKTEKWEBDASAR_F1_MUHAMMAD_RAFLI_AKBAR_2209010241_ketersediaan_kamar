@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Reservasi</h1>
    <a href="{{ route('reservasi.create') }}" class="btn btn-primary mb-3">Tambah Reservasi</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nomor Kamar</th>
                <th>Nama Pasien</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservasi as $r)
            <tr>
                <td>{{ $r->kamar->nomor_kamar }}</td>
                <td>{{ $r->pasien->nama }}</td>
                <td>{{ $r->tanggal_masuk }}</td>
                <td>{{ $r->tanggal_keluar ?? 'Belum keluar' }}</td>
                <td>{{ $r->status }}</td>
                <td>
                    <a href="{{ route('reservasi.show', $r->id) }}" class="btn btn-sm btn-info">Detail</a>
                    <a href="{{ route('reservasi.edit', $r->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('reservasi.destroy', $r->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Reservasi</h1>
    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kamar_id">Kamar</label>
            <select class="form-control" id="kamar_id" name="kamar_id" required>
                @foreach($kamar as $k)
                <option value="{{ $k->id }}">{{ $k->nomor_kamar }} - {{ $k->levelKamar->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pasien_id">Pasien</label>
            <select class="form-control" id="pasien_id" name="pasien_id" required>
                @foreach($pasien as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
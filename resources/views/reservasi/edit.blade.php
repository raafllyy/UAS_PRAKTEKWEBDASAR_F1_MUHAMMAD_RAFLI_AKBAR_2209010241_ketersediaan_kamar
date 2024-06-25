@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Reservasi</h1>
    <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kamar_id">Kamar</label>
            <select class="form-control" id="kamar_id" name="kamar_id" required>
                @foreach($kamar as $k)
                <option value="{{ $k->id }}" {{ $reservasi->kamar_id == $k->id ? 'selected' : '' }}>
                    {{ $k->nomor_kamar }} - {{ $k->levelKamar->nama }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pasien_id">Pasien</label>
            <select class="form-control" id="pasien_id" name="pasien_id" required>
                @foreach($pasien as $p)
                <option value="{{ $p->id }}" {{ $reservasi->pasien_id == $p->id ? 'selected' : '' }}>
                    {{ $p->nama }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ $reservasi->tanggal_masuk }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="aktif" {{ $reservasi->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="selesai" {{ $reservasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
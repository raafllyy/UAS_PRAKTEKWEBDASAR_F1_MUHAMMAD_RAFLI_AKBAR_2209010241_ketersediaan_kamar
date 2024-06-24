@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kamar</h1>
    <form action="{{ route('kamar.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomor_kamar">Nomor Kamar</label>
            <input type="text" class="form-control" id="nomor_kamar" name="nomor_kamar" required>
        </div>
        <div class="form-group">
            <label for="level_kamar_id">Level Kamar</label>
            <select class="form-control" id="level_kamar_id" name="level_kamar_id" required>
                @foreach(\App\Models\LevelKamar::all() as $lk)
                <option value="{{ $lk->id }}">{{ $lk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
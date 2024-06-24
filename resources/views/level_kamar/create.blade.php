@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Level Kamar</h1>
    <form action="{{ route('level_kamar.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Level Kamar</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
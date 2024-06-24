@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Level Kamar</h1>
    <a href="{{ route('level_kamar.create') }}" class="btn btn-primary mb-3">Tambah Level Kamar</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($levelKamar as $lk)
            <tr>
                <td>{{ $lk->nama }}</td>
                <td>{{ $lk->deskripsi }}</td>
                <td>
                    <a href="{{ route('level_kamar.edit', $lk->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('level_kamar.destroy', $lk->id) }}" method="POST" style="display: inline-block;">
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
@extends('layouts.app')

@section('title', 'Daftar Kamar')

@section('content')
<div class="container">
    <h1>Daftar Kamar</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nomor Kamar</th>
                <th>Level Kamar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kamar as $k)
            <tr>
                <td>{{ $k->nomor_kamar }}</td>
                <td>{{ $k->levelKamar->nama }}</td>
                <td>{{ $k->status }}</td>
                <td>
                    <a href="{{ route('kamar.edit', $k->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('kamar.destroy', $k->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kamar ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
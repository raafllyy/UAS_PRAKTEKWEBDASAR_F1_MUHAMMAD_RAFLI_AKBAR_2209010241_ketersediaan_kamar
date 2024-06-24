@extends('layouts.app')

@section('title', 'Edit Kamar')

@section('content')
<div class="container">
    <h1>Edit Kamar</h1>
    <form action="{{ route('kamar.update', $kamar->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nomor_kamar" class="form-label">Nomor Kamar</label>
            <input type="text" class="form-control @error('nomor_kamar') is-invalid @enderror" id="nomor_kamar" name="nomor_kamar" value="{{ old('nomor_kamar', $kamar->nomor_kamar) }}" required>
            @error('nomor_kamar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="level_kamar_id" class="form-label">Level Kamar</label>
            <select class="form-select @error('level_kamar_id') is-invalid @enderror" id="level_kamar_id" name="level_kamar_id" required>
                @foreach($levelKamar as $level)
                    <option value="{{ $level->id }}" {{ old('level_kamar_id', $kamar->level_kamar_id) == $level->id ? 'selected' : '' }}>
                        {{ $level->nama }}
                    </option>
                @endforeach
            </select>
            @error('level_kamar_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="tersedia" {{ old('status', $kamar->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="tidak tersedia" {{ old('status', $kamar->status) == 'Tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Kamar</button>
        <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
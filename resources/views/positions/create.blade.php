@extends('layouts.master')
@section('title', 'Tambah Jabatan')

@section('content')
<div class="container">
    <h2>Tambah Jabatan</h2>

    <form action="{{ route('positions.store') }}" method="POST">
        @csrf

        <label>Nama Jabatan</label>
        <input type="text" name="nama_jabatan" required>

        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" step="0.01" required>

        <div class="form-btn-group">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('positions.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection

@extends('layouts.master')
@section('title', 'Edit Jabatan')

@section('content')
<div class="container">
    <h2>Edit Jabatan</h2>

    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Jabatan</label>
        <input type="text" name="nama_jabatan" value="{{ $position->nama_jabatan }}" required>

        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" step="0.01" value="{{ $position->gaji_pokok }}" required>

        <div class="form-btn-group">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('positions.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection

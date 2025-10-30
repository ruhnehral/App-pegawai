@extends('layouts.master')
@section('title','Tambah Absensi')

@section('content')
<div class="container mt-4">
    <h2>Tambah Absensi</h2>

    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf

        <label>Karyawan</label>
        <select name="karyawan_id" required>
            <option value="">-- Pilih Karyawan --</option>
            @foreach($employees as $e)
            <option value="{{ $e->id }}">{{ $e->nama_lengkap }}</option>
            @endforeach
        </select>

        <label>Tanggal</label>
        <input type="date" name="tanggal" required>

        <label>Waktu Masuk</label>
        <input type="time" name="waktu_masuk">

        <label>Waktu Keluar</label>
        <input type="time" name="waktu_keluar">

        <label>Status Absensi</label>
        <select name="status_absensi" required>
            <option value="hadir">Hadir</option>
            <option value="izin">Izin</option>
            <option value="sakit">Sakit</option>
            <option value="alpha">Alpha</option>
        </select>

        <div class="form-btn-group mt-3">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('attendance.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection

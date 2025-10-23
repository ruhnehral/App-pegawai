@extends('layouts.master')
@section('title','Tambah Absensi')
@section('content')
<h2>Tambah Absensi</h2>

<form action="{{ route('attendance.store') }}" method="POST">
@csrf

<label>Karyawan</label><br>
<select name="karyawan_id" required>
@foreach($employees as $e)
<option value="{{ $e->id }}">{{ $e->nama_lengkap }}</option>
@endforeach
</select><br><br>

<label>Tanggal</label><br>
<input type="date" name="tanggal" required><br><br>

<label>Status</label><br>
<select name="status_absensi" required>
<option value="hadir">Hadir</option>
<option value="izin">Izin</option>
<option value="sakit">Sakit</option>
<option value="alpha">Alpha</option>
</select><br><br>

<button type="submit">Simpan</button>
</form>
@endsection

@extends('layouts.master')
@section('title','Input Gaji')
@section('content')
<h2>Input Gaji</h2>

<form action="{{ route('salaries.store') }}" method="POST">
@csrf

<label>Karyawan</label><br>
<select name="karyawan_id" required>
@foreach($employees as $e)
<option value="{{ $e->id }}">{{ $e->nama_lengkap }}</option>
@endforeach
</select><br><br>

<label>Bulan</label><br>
<input type="text" name="bulan" placeholder="contoh: Januari" required><br><br>

<label>Gaji Pokok</label><br>
<input type="number" name="gaji_pokok" required><br><br>

<label>Tunjangan</label><br>
<input type="number" name="tunjangan"><br><br>

<label>Potongan</label><br>
<input type="number" name="potongan"><br><br>

<label>Total Gaji</label><br>
<input type="number" name="total_gaji" required><br><br>

<button type="submit">Simpan</button>
</form>
@endsection

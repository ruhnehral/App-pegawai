@extends('layouts.master')
@section('title','Edit Gaji')
@section('content')
<h2>Edit Gaji</h2>

<form action="{{ route('salaries.update',$salary->id) }}" method="POST">
@csrf @method('PUT')

<label>Karyawan</label><br>
<select name="karyawan_id" required>
@foreach($employees as $e)
<option value="{{ $e->id }}" {{ $salary->karyawan_id==$e->id?'selected':'' }}>
    {{ $e->nama_lengkap }}
</option>
@endforeach
</select><br><br>

<label>Bulan</label><br>
<input type="text" name="bulan" value="{{ $salary->bulan }}" required><br><br>

<label>Gaji Pokok</label><br>
<input type="number" name="gaji_pokok" value="{{ $salary->gaji_pokok }}" required><br><br>

<label>Tunjangan</label><br>
<input type="number" name="tunjangan" value="{{ $salary->tunjangan }}"><br><br>

<label>Potongan</label><br>
<input type="number" name="potongan" value="{{ $salary->potongan }}"><br><br>

<label>Total Gaji</label><br>
<input type="number" name="total_gaji" value="{{ $salary->total_gaji }}" required><br><br>

<button type="submit">Update</button>
</form>
@endsection

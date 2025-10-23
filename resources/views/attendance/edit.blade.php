@extends('layouts.master')
@section('title','Edit Absensi')
@section('content')
<h2>Edit Absensi</h2>

<form action="{{ route('attendance.update',$attendance->id) }}" method="POST">
@csrf @method('PUT')

<label>Karyawan</label><br>
<select name="karyawan_id" required>
@foreach($employees as $e)
<option value="{{ $e->id }}" {{ $attendance->karyawan_id == $e->id ? 'selected' : '' }}>
    {{ $e->nama_lengkap }}
</option>
@endforeach
</select><br><br>

<label>Tanggal</label><br>
<input type="date" name="tanggal" value="{{ $attendance->tanggal }}" required><br><br>

<label>Status</label><br>
<select name="status_absensi" required>
<option value="hadir" {{ $attendance->status_absensi=='hadir'?'selected':'' }}>Hadir</option>
<option value="izin" {{ $attendance->status_absensi=='izin'?'selected':'' }}>Izin</option>
<option value="sakit" {{ $attendance->status_absensi=='sakit'?'selected':'' }}>Sakit</option>
<option value="alpha" {{ $attendance->status_absensi=='alpha'?'selected':'' }}>Alpha</option>
</select><br><br>

<button type="submit">Update</button>
</form>
@endsection

@extends('layouts.master')
@section('title','Edit Karyawan')
@section('content')
<h2>Edit Karyawan</h2>

<form action="{{ route('employees.update', $employee->id) }}" method="POST">
@csrf @method('PUT')

<label>Nama Lengkap</label><br>
<input type="text" name="nama_lengkap" value="{{ $employee->nama_lengkap }}" required><br><br>

<label>Email</label><br>
<input type="email" name="email" value="{{ $employee->email }}" required><br><br>

<label>Nomor Telepon</label><br>
<input type="text" name="nomor_telepon" value="{{ $employee->nomor_telepon }}"><br><br>

<label>Tanggal Lahir</label><br>
<input type="date" name="tanggal_lahir" value="{{ $employee->tanggal_lahir }}"><br><br>

<label>Alamat</label><br>
<textarea name="alamat">{{ $employee->alamat }}</textarea><br><br>

<label>Tanggal Masuk</label><br>
<input type="date" name="tanggal_masuk" value="{{ $employee->tanggal_masuk }}" required><br><br>

<label>Status</label><br>
<select name="status">
    <option value="aktif" {{ $employee->status=='aktif'?'selected':'' }}>Aktif</option>
    <option value="nonaktif" {{ $employee->status=='nonaktif'?'selected':'' }}>Nonaktif</option>
</select><br><br>

<label>Departemen</label><br>
<select name="departemen_id" required>
    @foreach($departments as $d)
        <option value="{{$d->id}}" {{ $employee->departemen_id==$d->id?'selected':'' }}>
            {{$d->nama_departemen}}
        </option>
    @endforeach
</select><br><br>

<label>Jabatan</label><br>
<select name="jabatan_id" required>
    @foreach($positions as $p)
        <option value="{{$p->id}}" {{ $employee->jabatan_id==$p->id?'selected':'' }}>
            {{$p->nama_jabatan}}
        </option>
    @endforeach
</select><br><br>

<button type="submit">Update</button>
</form>
@endsection

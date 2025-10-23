@extends('layouts.master')
@section('title','Tambah Karyawan')
@section('content')
<h2>Tambah Karyawan</h2>

<form action="{{ route('employees.store') }}" method="POST">
@csrf
<label>Nama Lengkap</label><br>
<input type="text" name="nama_lengkap" required><br><br>

<label>Email</label><br>
<input type="email" name="email" required><br><br>

<label>Nomor Telepon</label><br>
<input type="text" name="nomor_telepon"><br><br>

<label>Tanggal Lahir</label><br>
<input type="date" name="tanggal_lahir"><br><br>

<label>Alamat</label><br>
<textarea name="alamat"></textarea><br><br>

<label>Tanggal Masuk</label><br>
<input type="date" name="tanggal_masuk" required><br><br>

<label>Status</label><br>
<select name="status">
    <option value="aktif">Aktif</option>
    <option value="nonaktif">Nonaktif</option>
</select><br><br>

<label>Departemen</label><br>
<select name="departemen_id" required>
    <option value="">-- Pilih Departemen --</option>
    @foreach($departments as $d)
        <option value="{{$d->id}}">{{$d->nama_departemen}}</option>
    @endforeach
</select><br><br>

<label>Jabatan</label><br>
<select name="jabatan_id" required>
    <option value="">-- Pilih Jabatan --</option>
    @foreach($positions as $p)
        <option value="{{$p->id}}">{{$p->nama_jabatan}}</option>
    @endforeach
</select><br><br>

<button type="submit">Simpan</button>
</form>
@endsection

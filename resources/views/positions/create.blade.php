@extends('layouts.master')
@section('title','Tambah Jabatan')
@section('content')
<h2>Tambah Jabatan</h2>

<form action="{{ route('positions.store') }}" method="POST">
    @csrf
    <label>Nama Jabatan</label><br>
    <input type="text" name="nama_jabatan" required><br><br>

    <label>Gaji Pokok</label><br>
    <input type="number" name="gaji_pokok" required><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection

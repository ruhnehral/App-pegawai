@extends('layouts.master')
@section('title','Tambah Departemen')
@section('content')
<h2>Tambah Departemen</h2>

<form action="{{ route('departments.store') }}" method="POST">
    @csrf
    <label>Nama Departemen</label><br>
    <input type="text" name="nama_departemen" required><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection

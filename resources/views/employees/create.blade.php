@extends('layouts.master')
@section('title','Tambah Karyawan')

@section('content')
<div class="container mt-4">
    <h2>Tambah Karyawan</h2>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Nomor Telepon</label>
        <input type="text" name="no_telepon">

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir">

        <label>Alamat</label>
        <textarea name="alamat" rows="3"></textarea>

        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" required>

        <label>Departemen</label>
        <select name="departemen_id" required>
            <option value="">-- Pilih Departemen --</option>
            @foreach($departments as $d)
            <option value="{{ $d->id }}">{{ $d->nama_departemen }}</option>
            @endforeach
        </select>

        <label>Jabatan</label>
        <select name="jabatan_id" required>
            <option value="">-- Pilih Jabatan --</option>
            @foreach($positions as $p)
            <option value="{{ $p->id }}">{{ $p->nama_jabatan }}</option>
            @endforeach
        </select>

        <label>Status</label>
        <select name="status">
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
        </select>

        <div class="form-btn-group">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('employees.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection

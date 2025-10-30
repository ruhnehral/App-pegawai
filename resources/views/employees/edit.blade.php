@extends('layouts.master')
@section('title','Edit Karyawan')

@section('content')
<div class="container mt-4">
    <h2>Edit Karyawan</h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf @method('PUT')

        <label>ID Karyawan</label>
        <input type="text" value="{{ $employee->id }}" disabled>

        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="{{ $employee->nama_lengkap }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ $employee->email }}" required>

        <label>Nomor Telepon</label>
        <input type="text" name="no_telepon" value="{{ $employee->no_telepon }}">

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ $employee->tanggal_lahir }}">

        <label>Alamat</label>
        <textarea name="alamat" rows="3">{{ $employee->alamat }}</textarea>

        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" value="{{ $employee->tanggal_masuk }}" required>

        <label>Departemen</label>
        <select name="departemen_id" required>
            @foreach($departments as $d)
            <option value="{{ $d->id }}" {{ $d->id == $employee->departemen_id ? 'selected' : '' }}>
                {{ $d->nama_departemen }}
            </option>
            @endforeach
        </select>

        <label>Jabatan</label>
        <select name="jabatan_id" required>
            @foreach($positions as $p)
            <option value="{{ $p->id }}" {{ $p->id == $employee->jabatan_id ? 'selected' : '' }}>
                {{ $p->nama_jabatan }}
            </option>
            @endforeach
        </select>

        <label>Status</label>
        <select name="status">
            <option value="aktif" {{ $employee->status=='aktif'?'selected':'' }}>Aktif</option>
            <option value="nonaktif" {{ $employee->status=='nonaktif'?'selected':'' }}>Nonaktif</option>
        </select>

        <div class="form-btn-group">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('employees.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection

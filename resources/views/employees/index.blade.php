@extends('layouts.master')
@section('title','Data Karyawan')
@section('content')
<h2>Data Karyawan</h2>

<a href="{{ route('employees.create') }}">+ Tambah Karyawan</a>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Nama Lengkap</th>
    <th>Email</th>
    <th>Departemen</th>
    <th>Jabatan</th>
    <th>Aksi</th>
</tr>
@foreach($employees as $e)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $e->nama_lengkap }}</td>
    <td>{{ $e->email }}</td>
    <td>{{ $e->department?->nama_departemen }}</td>
    <td>{{ $e->position?->nama_jabatan }}</td>
    <td>
        <a href="{{ route('employees.edit',$e->id) }}">Edit</a>
        <form action="{{ route('employees.destroy',$e->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button onclick="return confirm('Hapus data?')">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection

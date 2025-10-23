@extends('layouts.master')
@section('title','Data Jabatan')
@section('content')
<h2>Data Jabatan</h2>

<a href="{{ route('positions.create') }}">+ Tambah Jabatan</a>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Nama Jabatan</th>
    <th>Gaji Pokok</th>
    <th>Aksi</th>
</tr>
@foreach($positions as $p)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $p->nama_jabatan }}</td>
    <td>{{ $p->gaji_pokok }}</td>
    <td>
        <a href="{{ route('positions.edit',$p->id) }}">Edit</a>
        <form action="{{ route('positions.destroy',$p->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button onclick="return confirm('Hapus data?')">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection

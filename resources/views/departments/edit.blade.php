@extends('layouts.master')
@section('title','Edit Departemen')
@section('content')
<h2>Edit Departemen</h2>

<form action="{{ route('departments.update', $department->id) }}" method="POST">
    @csrf @method('PUT')
    <label>Nama Departemen</label><br>
    <input type="text" name="nama_departemen" value="{{ $department->nama_departemen }}" required><br><br>

    <button type="submit">Update</button>
</form>
@endsection

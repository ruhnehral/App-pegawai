@extends('layouts.master')
@section('title','Edit Gaji')

@section('content')
<div class="container">
    <h2>Edit Gaji</h2>

    <form action="{{ route('salaries.update',$salary->id) }}" method="POST">
        @csrf @method('PUT')

        <label>Karyawan</label>
        <select name="karyawan_id" required>
            @foreach($employees as $e)
            <option value="{{ $e->id }}" {{ $salary->karyawan_id == $e->id ? 'selected' : '' }}>
                {{ $e->nama_lengkap }}
            </option>
            @endforeach
        </select>

        <label>Bulan</label>
        <input type="month" name="bulan" value="{{ $salary->bulan }}" required>

        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" value="{{ $salary->gaji_pokok }}" step="any" min="0" required>

        <label>Tunjangan</label>
        <input type="number" name="tunjangan" value="{{ $salary->tunjangan }}" step="any" min="0">

        <label>Potongan</label>
        <input type="number" name="potongan" value="{{ $salary->potongan }}" step="any" min="0">

        <label>Total Gaji</label>
        <input type="number" name="total_gaji" value="{{ $salary->total_gaji }}" step="any" min="0" required>

        <div class="form-btn-group">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('salaries.index') }}" class="btn btn-danger">Batal</a>
        </div>

    </form>
</div>
@endsection

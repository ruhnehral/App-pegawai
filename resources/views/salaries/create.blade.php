@extends('layouts.master')
@section('title','Tambah Gaji')

@section('content')
<div class="container">
    <h2>Tambah Gaji</h2>

    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf

        <label>Karyawan</label>
        <select name="karyawan_id" required>
            <option value="">-- Pilih Karyawan --</option>
            @foreach($employees as $e)
                <option value="{{ $e->id }}">{{ $e->nama_lengkap }}</option>
            @endforeach
        </select>

        <label>Bulan</label>
        <input type="month" name="bulan" required>

        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" step="any" min="0" required>

        <label>Tunjangan</label>
        <input type="number" name="tunjangan" step="any" min="0">

        <label>Potongan</label>
        <input type="number" name="potongan" step="any" min="0">

        <label>Total Gaji</label>
        <input type="number" name="total_gaji" step="any" min="0" required>

        <div class="form-btn-group">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('salaries.index') }}" class="btn btn-danger">Batal</a>
        </div>

    </form>
</div>
@endsection

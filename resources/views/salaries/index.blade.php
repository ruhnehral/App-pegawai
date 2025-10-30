@extends('layouts.master')
@section('title','Data Gaji')

@section('content')
<div class="container">
    <h2>Data Gaji</h2>

    <a href="{{ route('salaries.create') }}" class="add-btn">
        <i class="fa fa-plus"></i> Tambah Gaji
    </a>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Karyawan</th>
                    <th>Bulan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($salaries as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->employee->nama_lengkap ?? '-' }}</td>
                    <td>{{ $s->bulan }}</td>
                    <td>Rp {{ number_format($s->gaji_pokok, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($s->tunjangan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($s->potongan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($s->total_gaji, 0, ',', '.') }}</td>
                    <td class="table-action">
                        <a href="{{ route('salaries.edit', $s->id) }}" class="action-btn action-edit" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form action="{{ route('salaries.destroy',$s->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="action-btn action-delete" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">Belum ada data gaji.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

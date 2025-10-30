@extends('layouts.master')
@section('title','Data Absensi')

@section('content')
<div class="container">
    <div class="page-header">
        <h2>Data Absensi</h2>
            <a href="{{ route('attendance.create') }}" class="add-btn">
        <i class="fa fa-plus"></i> Tambah Absensi
    </a>

    </div>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Karyawan</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->employee->nama_lengkap ?? '-' }}</td>
                    <td>{{ $a->tanggal }}</td>
                    <td>{{ $a->waktu_masuk ?? '-' }}</td>
                    <td>{{ $a->waktu_keluar ?? '-' }}</td>
                    <td>{{ ucfirst($a->status_absensi) }}</td>
                    
                    <td class="table-action">
                        <a href="{{ route('attendance.edit', $a->id) }}" class="action-btn action-edit" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>        
                        <form action="{{ route('attendance.destroy',$a->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="action-btn action-delete" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data absensi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

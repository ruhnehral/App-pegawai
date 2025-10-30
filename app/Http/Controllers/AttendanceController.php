<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')->get();
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable',
            'waktu_keluar' => 'nullable',
            'status_absensi' => 'required'
        ]);

        Attendance::create($request->only([
            'karyawan_id', 'tanggal', 'waktu_masuk', 'waktu_keluar', 'status_absensi'
        ]));

        return redirect()->route('attendance.index')->with('success', 'Absensi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable',
            'waktu_keluar' => 'nullable',
            'status_absensi' => 'required'
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->only([
            'karyawan_id', 'tanggal', 'waktu_masuk', 'waktu_keluar', 'status_absensi'
        ]));

        return redirect()->route('attendance.index')->with('success', 'Absensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Attendance::destroy($id);
        return redirect()->route('attendance.index')->with('success', 'Absensi berhasil dihapus.');
    }
}

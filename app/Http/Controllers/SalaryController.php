<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->get();
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'bulan' => 'required',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
            'total_gaji' => 'required|numeric|min:0',
        ]);

        Salary::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan ?? 0,
            'potongan' => $request->potongan ?? 0,
            'total_gaji' => $request->total_gaji,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $salary = Salary::findOrFail($id);
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'bulan' => 'required',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
            'total_gaji' => 'required|numeric|min:0',
        ]);

        $salary = Salary::findOrFail($id);
        $salary->update([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan ?? 0,
            'potongan' => $request->potongan ?? 0,
            'total_gaji' => $request->total_gaji,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Salary::destroy($id);
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus.');
    }
}

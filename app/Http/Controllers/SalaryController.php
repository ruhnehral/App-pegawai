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
            'gaji_pokok' => 'required|numeric',
            'total_gaji' => 'required|numeric'
        ]);

        Salary::create($request->all());
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan');
    }

    public function edit($id)
    {
        $salary = Salary::findOrFail($id);
        $employees = Employee::all();

        return view('salaries.edit', compact('salary','employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'bulan' => 'required',
            'gaji_pokok' => 'required|numeric',
            'total_gaji' => 'required|numeric'
        ]);

        $salary = Salary::findOrFail($id);
        $salary->update($request->all());

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui');
    }

    public function destroy($id)
    {
        Salary::destroy($id);
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus');
    }
}

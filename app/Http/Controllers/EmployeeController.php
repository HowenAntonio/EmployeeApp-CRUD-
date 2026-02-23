<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(10);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $employees,
            ], 200);
        } else {
            return view('home', compact('employees'));
        }

    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|min:5|max:20',
            'age'          => 'required|integer|min:21',
            'address'      => 'required|min:10|max:40',
            'phone_number' => ['required', 'min:9', 'max:12', 'regex:/^08[0-9]{7,10}$/'],
        ], [
            'name.required'         => 'Nama karyawan wajib diisi.',
            'name.min'              => 'Nama karyawan minimal 5 karakter.',
            'name.max'              => 'Nama karyawan maksimal 20 karakter.',
            'age.required'          => 'Umur karyawan wajib diisi.',
            'age.integer'           => 'Umur harus berupa angka.',
            'age.min'               => 'Umur karyawan harus lebih dari 20 tahun.',
            'address.required'      => 'Alamat karyawan wajib diisi.',
            'address.min'           => 'Alamat karyawan minimal 10 karakter.',
            'address.max'           => 'Alamat karyawan maksimal 40 karakter.',
            'phone_number.required' => 'Nomor telp. karyawan wajib diisi.',
            'phone_number.min'      => 'Nomor telp. minimal 9 karakter.',
            'phone_number.max'      => 'Nomor telp. maksimal 12 karakter.',
            'phone_number.regex'    => 'Nomor telp. harus dimulai dari 08.',
        ]);

        Employee::create($request->only('name', 'age', 'address', 'phone_number'));

        if (request()->wantsJson()) {
            return response()->json([
                'message' => 'Karyawan berhasil ditambahkan.',
            ], 201);
        } else {
            return redirect()->route('employees.index')
                ->with('success', 'Karyawan berhasil ditambahkan.');
        }

    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'         => 'required|min:5|max:20',
            'age'          => 'required|integer|min:21',
            'address'      => 'required|min:10|max:40',
            'phone_number' => ['required', 'min:9', 'max:12', 'regex:/^08[0-9]{7,10}$/'],
        ], [
            'name.required'         => 'Nama karyawan wajib diisi.',
            'name.min'              => 'Nama karyawan minimal 5 karakter.',
            'name.max'              => 'Nama karyawan maksimal 20 karakter.',
            'age.required'          => 'Umur karyawan wajib diisi.',
            'age.integer'           => 'Umur harus berupa angka.',
            'age.min'               => 'Umur karyawan harus lebih dari 20 tahun.',
            'address.required'      => 'Alamat karyawan wajib diisi.',
            'address.min'           => 'Alamat karyawan minimal 10 karakter.',
            'address.max'           => 'Alamat karyawan maksimal 40 karakter.',
            'phone_number.required' => 'Nomor telp. karyawan wajib diisi.',
            'phone_number.min'      => 'Nomor telp. minimal 9 karakter.',
            'phone_number.max'      => 'Nomor telp. maksimal 12 karakter.',
            'phone_number.regex'    => 'Nomor telp. harus dimulai dari 08.',
        ]);

        $employee->update($request->only('name', 'age', 'address', 'phone_number'));

        return redirect()->route('employees.index')
            ->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Karyawan berhasil dihapus.');
    }
}

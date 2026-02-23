<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return response()->json([
            'data' => $employees->map(function ($employee) {
                return $employee->makeHidden('id', 'created_at', 'updated_at');
            }),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
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

        $isEmployeeExists = Employee::get()->where('name', $request->name)->where('age', $request->age)->first();
        if ($isEmployeeExists) {
            return response()->json([
                'message' => 'Karyawan dengan nama dan umur ini sudah terdaftar.',
            ], 409);
        }

        Employee::create($request->only('name', 'age', 'address', 'phone_number'));

        return response()->json([
            'message' => 'Karyawan berhasil ditambahkan.',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return response()->json([
            'data' => $employee,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
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

        $isEmployeeExists = Employee::get()->where('name', $request->name)->where('age', $request->age)->where('id', '!=', $employee->id)->first();
        if ($isEmployeeExists) {
            return response()->json([
                'message' => 'Karyawan dengan nama dan umur ini sudah terdaftar di karyawan lain.',
            ], 409);
        }

        $employee->update($request->only('name', 'age', 'address', 'phone_number'));

        return response()->json([
            'message' => 'Karyawan berhasil diperbarui.',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json([
            'message' => 'Karyawan berhasil dihapus.',
        ], 200);
    }
}

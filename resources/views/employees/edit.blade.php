@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">

        {{-- Breadcrumb --}}
        <div class="mb-3 breadcrumb-bar">
            <a href="{{ route('employees.index') }}" class="breadcrumb-link">Karyawan</a>
            <span class="mx-1">›</span> Edit — <strong class="text-dark-strong">{{ $employee->name }}</strong>
        </div>

        <div class="panel">
            <div class="panel-head">
                <h5>Edit Data Karyawan</h5>
                <span class="id-badge">ID #{{ $employee->id }}</span>
            </div>
            <div class="panel-body">
                <form action="{{ route('employees.update', $employee) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Karyawan</label>
                        <input type="text" id="name" name="name"
                               value="{{ old('name', $employee->name) }}"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Contoh: Budi Santoso">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="field-hint">5–20 karakter</div>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Umur</label>
                        <input type="number" id="age" name="age"
                               value="{{ old('age', $employee->age) }}"
                               class="form-control @error('age') is-invalid @enderror"
                               placeholder="Contoh: 25" min="1">
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="field-hint">Harus lebih dari 20 tahun</div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea id="address" name="address" rows="3"
                                  class="form-control @error('address') is-invalid @enderror"
                                  placeholder="Contoh: Jl. Merdeka No. 10, Jakarta">{{ old('address', $employee->address) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="field-hint">10–40 karakter</div>
                    </div>

                    <div class="mb-4">
                        <label for="phone_number" class="form-label">Nomor Telepon</label>
                        <input type="text" id="phone_number" name="phone_number"
                               value="{{ old('phone_number', $employee->phone_number) }}"
                               class="form-control @error('phone_number') is-invalid @enderror"
                               placeholder="Contoh: 081234567890">
                        @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="field-hint">9–12 karakter, dimulai dari 08</div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-green">Perbarui</button>
                        <a href="{{ route('employees.index') }}" class="btn-ghost">Batal</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection


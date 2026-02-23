@extends('layout')

@section('content')

    {{-- Page heading --}}
    <div class="d-flex justify-content-between align-items-end mb-3">
        <div>
            <h4 class="page-title">Daftar Karyawan</h4>
            <p class="page-subtitle">Kelola data karyawan perusahaan</p>
        </div>
        <a href="{{ route('employees.create') }}" class="btn-green">+ Tambah Karyawan</a>
    </div>

    <div class="panel">
        @if ($employees->isEmpty())
            <div class="text-center py-5">
                <div class="empty-icon">◌</div>
                <p class="mt-2 mb-0 empty-text">Belum ada data karyawan.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table mb-0 data-table">
                    <thead>
                        <tr class="thead-row">
                            <th class="py-3 px-4 th-label" style="width:44px;">#</th>
                            <th class="py-3 th-label">Nama</th>
                            <th class="py-3 th-label">Umur</th>
                            <th class="py-3 th-label">Alamat</th>
                            <th class="py-3 th-label">No. Telepon</th>
                            <th class="py-3 pe-4 text-end th-label" style="width:160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $i => $employee)
                            <tr class="tr-data">
                                <td class="py-3 px-4 td-num">{{ $employees->firstItem() + $i }}</td>
                                <td class="py-3 td-name">{{ $employee->name }}</td>
                                <td class="py-3 td-age">{{ $employee->age }} thn</td>
                                <td class="py-3 td-addr">{{ $employee->address }}</td>
                                <td class="py-3 td-phone">{{ $employee->phone_number }}</td>
                                <td class="py-3 pe-4 text-end d-flex justify-content-end align-items-center gap-2 td-action">
                                    <a href="{{ route('employees.edit', $employee) }}" class="btn-ghost me-1">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Hapus karyawan {{ $employee->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-red">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end align-items-center px-4 py-3 pagination-bar">
                {{-- <span class="pagination-info">
                    Menampilkan {{ $employees->firstItem() }}–{{ $employees->lastItem() }}
                    dari {{ $employees->total() }} karyawan
                </span> --}}
                {{ $employees->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

@endsection

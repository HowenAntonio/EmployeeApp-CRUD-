{{-- extend dari layout --}}

@extends('layout')

{{-- isi dari section content --}}

@section('content')
    {{-- Table isinya data employee dan tombol sesuai ada di task.txt --}}
    {{-- Tombol untuk menambah employee --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="/employees/create" class="btn btn-primary">Add Employee</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->age }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->phone_number }}</td>
                                <td>
                                    <a href="/employees/{{ $employee->id }}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/employees/{{ $employee->id }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

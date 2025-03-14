<!-- resources/views/departments/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Department Details</h1>
        <p><strong>Department Name:</strong> {{ $department->department_name }}</p>
        <p><strong>Created On:</strong> {{ $department->created_at }}</p>
        <p><strong>Updated On:</strong> {{ $department->updated_at }}</p>

        <h3>Employees in this Department:</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee Code</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($department->employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->emp_code }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->username }}</td>
                        <td>{{ $employee->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No employees in this department.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection

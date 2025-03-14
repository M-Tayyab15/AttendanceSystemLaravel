<!-- resources/views/departments/index.blade.php -->
@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Manage Departments</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Add Department
        </a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Number of Employees</th> <!-- New column for employee count -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->department_name }}</td>
                        <td>{{ $department->employees_count > 0 ? $department->employees_count : 'No Employees' }}</td>

                        <td>
                            <a href="{{ route('departments.show', $department->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <nav>
            {{ $departments->links() }}
        </nav>
    </div>
@endsection

@push('scripts')
    <script>
        // Dynamically set the page title based on the first <h1> content
        document.addEventListener("DOMContentLoaded", function() {
            var firstH1 = document.querySelector('h1');  // Select the first <h1> element
            if (firstH1) {
                document.title = firstH1.innerText;  // Set the title of the tab to the <h1> text
            }
        });
    </script>
@endpush

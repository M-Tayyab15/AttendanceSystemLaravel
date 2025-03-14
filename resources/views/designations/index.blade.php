@extends('layouts.app')


@section('content')
<div class="container">
    <h1>Manage Designations</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('designations.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Add Designation
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Designation</th>
                <th>Number of Employees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($designations as $designation)
                <tr>
                    <td>{{ $designation->id }}</td>
                    <td>{{ $designation->designation }}</td>
                    <td>{{ $designation->employees_count }}</td> 
                    <td>
                        <a href="{{ route('designations.show', $designation->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('designations.edit', $designation->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('designations.destroy', $designation->id) }}" method="POST" style="display:inline;">
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
        {{ $designations->links() }}
    </nav>
</div>
@endsection

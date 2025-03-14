@extends('layouts.app')

<head>
<title>Manage Shifts</title>
</head>

@section('content')
<div class="container">
    <h1>Manage Shifts</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('shifts.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Add Shift
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Shift Name</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>Grace Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shifts as $shift)
                <tr>
                    <td>{{ $shift->id }}</td>
                    <td>{{ $shift->shift_name }}</td>
                    <td>{{ $shift->in_time }}</td>
                    <td>{{ $shift->out_time }}</td>
                    <td>{{ $shift->grace_time }}</td>
                    <td>
                        <a href="{{ route('shifts.show', $shift->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('shifts.edit', $shift->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('shifts.destroy', $shift->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
<h2>Employees in the Designation: {{ $designation->designation }}</h2>

    <!-- Go Back Button -->
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Go Back
    </a>

<table class="table">
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($designation->employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection

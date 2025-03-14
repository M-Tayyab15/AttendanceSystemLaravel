<!-- resources/views/departments/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Department</h1>
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="department_name">Department Name</label>
                <input type="text" name="department_name" id="department_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save Department</button>
        </form>
    </div>
@endsection

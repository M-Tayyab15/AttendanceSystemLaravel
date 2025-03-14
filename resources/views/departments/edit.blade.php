<!-- resources/views/departments/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Department</h1>
        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="department_name">Department Name</label>
                <input type="text" name="department_name" id="department_name" class="form-control" value="{{ $department->department_name }}" required>
            </div>
            <button type="submit" class="btn btn-warning mt-3">Update Department</button>
        </form>
    </div>
@endsection

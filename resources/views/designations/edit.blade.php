@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Designation</h1>

    <!-- Go Back Button -->
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Go Back
    </a>

    <form action="{{ route('designations.update', $designation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" id="designation" name="designation" class="form-control" value="{{ old('designation', $designation->designation) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection

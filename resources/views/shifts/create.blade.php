@extends('layouts.app')
<head>
    <!-- Include flatpickr CSS in your <head> -->
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

    <!-- Include flatpickr JS in your <script> section -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
@section('content')
<div class="container">
    <h1>Add New Shift</h1>

    <!-- Check if there are any error messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shifts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="shift_name" class="form-label">Shift Name</label>
            <input type="text" class="form-control @error('shift_name') is-invalid @enderror" id="shift_name" name="shift_name" value="{{ old('shift_name') }}" required>
            @error('shift_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="in_time" class="form-label">In Time</label>
            <input type="time" class="form-control @error('in_time') is-invalid @enderror" id="in_time" name="in_time" value="{{ old('in_time') }}">
            @error('in_time')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="out_time" class="form-label">Out Time</label>
            <input type="time" class="form-control @error('out_time') is-invalid @enderror" id="out_time" name="out_time" value="{{ old('out_time') }}">
            @error('out_time')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="grace_time" class="form-label">Grace Time</label>
            <input type="text" class="form-control @error('grace_time') is-invalid @enderror" id="grace_time" name="grace_time" placeholder="Select Time" value="{{ old('grace_time') }}" required>
            @error('grace_time')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<script>
    flatpickr("#grace_time", {
        enableTime: true,
        noCalendar: true,    // Disable the calendar view
        dateFormat: "H:i:S", // Force 24-hour format with seconds (HH:mm:ss)
        time_24hr: true,     // Ensure it uses 24-hour format (e.g., 00:15:00)
    });
</script>
@endsection

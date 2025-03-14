@extends('layouts.app')
<head>
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

@section('content')
<div class="container">
    <h1>Edit Shift</h1>

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

    <form action="{{ route('shifts.update', $shift->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="shift_name" class="form-label">Shift Name</label>
            <input type="text" class="form-control" id="shift_name" name="shift_name" value="{{ $shift->shift_name }}" required>
        </div>
        <div class="mb-3">
            <label for="in_time" class="form-label">In Time</label>
            <input type="time" class="form-control" id="in_time" name="in_time" value="{{ $shift->in_time }}">
        </div>
        <div class="mb-3">
            <label for="out_time" class="form-label">Out Time</label>
            <input type="time" class="form-control" id="out_time" name="out_time" value="{{ $shift->out_time }}">
        </div>
        <div class="mb-3">
            <label for="grace_time" class="form-label">Grace Time</label>
            <input type="text" class="form-control @error('grace_time') is-invalid @enderror" id="grace_time" name="grace_time" placeholder="Select Time" value="{{ old('grace_time') }}" required>
            @error('grace_time')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
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

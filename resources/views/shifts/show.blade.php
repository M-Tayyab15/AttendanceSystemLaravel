@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shift Details</h1>

    <div>
        <strong>Shift Name:</strong> {{ $shift->shift_name }}<br>
        <strong>In Time:</strong> {{ $shift->in_time }}<br>
        <strong>Out Time:</strong> {{ $shift->out_time }}<br>
        <strong>Grace Time:</strong> {{ $shift->grace_time }}<br>
    </div>

    <a href="{{ route('shifts.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection

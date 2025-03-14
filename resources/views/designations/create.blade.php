@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Designation</h1>

    <form action="{{ route('designations.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" id="designation" name="designation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
@endsection

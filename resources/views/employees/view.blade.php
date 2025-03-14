@extends('layouts.app')

@section('content')
<div class="main">
    <h2 class="my-4 text-center">View Employee</h2>

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <!-- Employee Image -->
            <div class="text-center mb-4">
                @if ($employee->image)
                    <img src="{{ asset('images/employee/' . $employee->image) }}" alt="Employee Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/150" alt="Default Employee Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                @endif
            </div>

            <!-- Personal Details -->
            <h4 class="mb-3 text-primary">Personal Details</h4>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Employee Code:</th>
                        <td>{{ $employee->emp_code }}</td>
                    </tr>
                    <tr>
                        <th>First Name:</th>
                        <td>{{ $employee->first_name }}</td>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                        <td>{{ $employee->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Username:</th>
                        <td>{{ $employee->username }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{ $employee->phone }}</td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td>{{ ucfirst($employee->gender) }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th>
                        <td>{{ \Carbon\Carbon::parse($employee->DOB)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Age:</th>
                        <td>{{ $employee->age }}</td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td>{{ $employee->address }}</td>
                    </tr>
                    <tr>
                        <th>Country:</th>
                        <td>{{ $employee->country }}</td>
                    </tr>
                    <tr>
                        <th>CNIC:</th>
                        <td>{{ $employee->cnic }}</td>
                    </tr>
                    <tr>
                        <th>CNIC Expiry:</th>
                        <td>{{ \Carbon\Carbon::parse($employee->cnic_expiry)->format('d-m-Y') }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Academic Details -->
            <h4 class="mb-3 text-primary">Academic Details</h4>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Qualification:</th>
                        <td>{{ $employee->qualification }}</td>
                    </tr>
                    <tr>
                        <th>Experience:</th>
                        <td>{{ $employee->experience }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Career Details -->
            <h4 class="mb-3 text-primary">Career Details</h4>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Salary:</th>
                        <td>{{ $employee->salary }}</td>
                    </tr>
                    <tr>
                        <th>Employment Status:</th>
                        <td>{{ ucfirst($employee->emp_status) }}</td>
                    </tr>
                    <tr>
                        <th>Employee Type:</th>
                        <td>{{ ucfirst($employee->emp_type) }}</td>
                    </tr>
                    <tr>
                        <th>Joining Date:</th>
                        <td>{{ \Carbon\Carbon::parse($employee->joining_date)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Resignation Date:</th>
                        <td>{{ $employee->resignation_date ? \Carbon\Carbon::parse($employee->resignation_date)->format('d-m-Y') : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Shift:</th>
                        <td>
                            @if ($employee->shift)
                                {{ $employee->shift->shift_name }} 
                                @if ($employee->shift->in_time && $employee->shift->out_time)
                                    <br>Shift-in: {{ \Carbon\Carbon::parse($employee->shift->in_time)->format('H:i') }} 
                                    <br>Shift-out: {{ \Carbon\Carbon::parse($employee->shift->out_time)->format('H:i') }}
                                    <br>Total Hours: {{ \Carbon\Carbon::parse($employee->shift->in_time)->diffInHours($employee->shift->out_time) }} hours
                                @else
                                    <br>No shift-in/out times set
                                @endif
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Department:</th>
                        <td>{{ $employee->department ? $employee->department->department_name : 'No Department' }}</td>
                    </tr>
                    <tr>
                        <th>Designation:</th>
                        <td>{{ $employee->designation ? $employee->designation->designation : 'No Designation' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center mt-3">
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </div>
</div>
@endsection

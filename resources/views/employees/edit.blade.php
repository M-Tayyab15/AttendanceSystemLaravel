@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Edit Employee</h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


     <!-- Employee Image Preview -->
        <div class="row g-3 mb-4">
            <!-- Image Preview Section -->
            <div class="col-md-12 text-center">
                <div class="mb-3">
                    @if ($employee->image)
                        <img src="{{ asset('images/employee/' . $employee->image) }}" alt="Employee Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/150" alt="Default Employee Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    @endif
                </div>
            </div>

            <!-- File Input Section -->
            <div class="col-md-12 text-center">
                <div class="form-floating">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="floatingImage" name="image" accept="image/*" onchange="previewImage(event)">
                    <label for="floatingImage">Upload Employee Image</label>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row g-3">
            <!-- Employee Code -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('emp_code') is-invalid @enderror" id="floatingEmpCode" name="emp_code" placeholder="Employee Code" value="{{ old('emp_code', $employee->emp_code) }}" required>
                    <label for="floatingEmpCode">Employee Code</label>
                    @error('emp_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- First Name -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="floatingFirstName" name="first_name" placeholder="First Name" value="{{ old('first_name', $employee->first_name) }}" required>
                    <label for="floatingFirstName">First Name</label>
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Last Name -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="floatingLastName" name="last_name" placeholder="Last Name" value="{{ old('last_name', $employee->last_name) }}" required>
                    <label for="floatingLastName">Last Name</label>
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Gender -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select @error('gender') is-invalid @enderror" id="floatingGender" name="gender" aria-label="Gender">
                        <option value="male" {{ old('gender', $employee->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $employee->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    <label for="floatingGender">Gender</label>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Username -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingUsername" name="username" placeholder="Username" value="{{ old('username', $employee->username) }}" required>
                    <label for="floatingUsername">Username</label>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email" placeholder="Email" value="{{ old('email', $employee->email) }}" required>
                    <label for="floatingEmail">Email</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Password -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password (leave blank to keep current)</label>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Phone Number -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="floatingPhone" name="phone" placeholder="Phone Number" value="{{ old('phone', $employee->phone) }}">
                    <label for="floatingPhone">Phone Number</label>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Address -->
            <div class="col-md-6">
                <div class="form-floating">
                    <textarea class="form-control @error('address') is-invalid @enderror" placeholder="Address" id="floatingAddress" name="address" style="height: 100px;">{{ old('address', $employee->address) }}</textarea>
                    <label for="floatingAddress">Address</label>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Country -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="floatingCountry" name="country" placeholder="Country" value="{{ old('country', $employee->country) }}">
                    <label for="floatingCountry">Country</label>
                    @error('country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Salary -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="number" class="form-control @error('salary') is-invalid @enderror" id="floatingSalary" name="salary" placeholder="Salary" value="{{ old('salary', $employee->salary) }}">
                    <label for="floatingSalary">Salary</label>
                    @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Experience -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('experience') is-invalid @enderror" id="floatingExperience" name="experience" placeholder="Experience" value="{{ old('experience', $employee->experience) }}">
                    <label for="floatingExperience">Experience</label>
                    @error('experience')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Qualification -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('qualification') is-invalid @enderror" id="floatingQualification" name="qualification" placeholder="Qualification" value="{{ old('qualification', $employee->qualification) }}">
                    <label for="floatingQualification">Qualification</label>
                    @error('qualification')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Resignation Date and Joining Date (side by side) -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" class="form-control @error('resignation_date') is-invalid @enderror" id="floatingResignationDate" name="resignation_date" placeholder="Resignation Date" value="{{ old('resignation_date', $employee->resignation_date) }}">
                    <label for="floatingResignationDate">Resignation Date</label>
                    @error('resignation_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" class="form-control @error('joining_date') is-invalid @enderror" id="floatingJoiningDate" name="joining_date" placeholder="Joining Date" value="{{ old('joining_date', $employee->joining_date) }}">
                    <label for="floatingJoiningDate">Joining Date</label>
                    @error('joining_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- DOB and Age (side by side) -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" class="form-control @error('DOB') is-invalid @enderror" id="floatingDOB" name="DOB" placeholder="Date of Birth" value="{{ old('DOB', $employee->DOB) }}" required>
                    <label for="floatingDOB">Date of Birth</label>
                    @error('DOB')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('age') is-invalid @enderror" id="floatingAge" name="age" placeholder="Age" value="{{ old('age', $employee->age) }}" disabled>
                    <label for="floatingAge">Age</label>
                    @error('age')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Employment Status -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select @error('emp_status') is-invalid @enderror" id="floatingEmpStatus" name="emp_status" aria-label="Employment Status">
                        <option value="active" {{ old('emp_status', $employee->emp_status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('emp_status', $employee->emp_status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    <label for="floatingEmpStatus">Employment Status</label>
                    @error('emp_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Employee Type -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select @error('emp_type') is-invalid @enderror" id="floatingEmpType" name="emp_type" aria-label="Employee Type">
                        <option value="full_time" {{ old('emp_type', $employee->emp_type) == 'full_time' ? 'selected' : '' }}>Full-Time</option>
                        <option value="part_time" {{ old('emp_type', $employee->emp_type) == 'part_time' ? 'selected' : '' }}>Part-Time</option>
                    </select>
                    <label for="floatingEmpType">Employee Type</label>
                    @error('emp_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Department and Designation Dropdown -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select @error('department_id') is-invalid @enderror" id="floatingDepartment" name="department_id">
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                {{ $department->department_name ?? 'No Department' }}
                            </option>
                        @endforeach
                    </select>
                    <label for="floatingDepartment">Department</label>
                    @error('department_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select @error('designation_id') is-invalid @enderror" id="floatingDesignation" name="designation_id">
                        @foreach($designations as $designation)
                            <option value="{{ $designation->id }}" {{ old('designation_id', $employee->designation_id) == $designation->id ? 'selected' : '' }}>
                                {{ $designation->designation ?? 'No Designation' }}
                            </option>
                        @endforeach
                    </select>
                    <label for="floatingDesignation">Designation</label>
                    @error('designation_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Shift Dropdown -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select @error('shift_id') is-invalid @enderror" id="floatingShiftId" name="shift_id" aria-label="Shift">
                        @foreach($shifts as $shift)
                            <option value="{{ $shift->id }}" {{ old('shift_id', $employee->shift_id) == $shift->id ? 'selected' : '' }}>{{ $shift->shift_name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingShiftId">Shift</label>
                    @error('shift_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Image Upload -->
            <!-- <div class="col-md-6">
                <div class="form-floating">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="floatingImage" name="image" accept="image/*">
                    <label for="floatingImage">Employee Image</label>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div> -->

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
        </div>
    </form>
</div>

<script>
// Function to calculate age based on date of birth
function calculateAge(dateOfBirth) {
    const dob = new Date(dateOfBirth);
    const today = new Date();
    let age = today.getFullYear() - dob.getFullYear();
    const m = today.getMonth() - dob.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
        age--;
    }
    return age;
}

// Update age when the date of birth field changes
document.getElementById('floatingDOB').addEventListener('input', function() {
    const dateOfBirth = this.value;
    const age = calculateAge(dateOfBirth);
    document.getElementById('floatingAge').value = age;
});
</script>

<script>
// Image preview function
function previewImage(event) {
    const output = document.querySelector('.text-center img');
    if (event.target.files && event.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            output.src = e.target.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
}
</script>
@endsection

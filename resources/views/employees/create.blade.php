@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Add Employee</h2>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Floating Labels Form -->
        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('emp_code') is-invalid @enderror" id="floatingEmpCode" name="emp_code" placeholder="Employee Code" value="{{ old('emp_code') }}" required>
                    <label for="floatingEmpCode">Employee Code</label>
                    @error('emp_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="floatingFirstName" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                    <label for="floatingFirstName">First Name</label>
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="floatingLastName" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                    <label for="floatingLastName">Last Name</label>
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingUsername" name="username" placeholder="Username" value="{{ old('username') }}" required>
                    <label for="floatingUsername">Username</label>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    <label for="floatingEmail">Email</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" class="form-control @error('joining_date') is-invalid @enderror" id="floatingJoiningDate" name="joining_date" placeholder="Joining Date" value="{{ old('joining_date') }}">
                    <label for="floatingJoiningDate">Joining Date</label>
                    @error('joining_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="floatingPhone" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                    <label for="floatingPhone">Phone Number</label>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <!-- Department Dropdown -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-control @error('department_id') is-invalid @enderror" id="floatingDepartment" name="department_id" required>
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingDepartment">Department</label>
                    @error('department_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Designation Dropdown -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-control @error('designation_id') is-invalid @enderror" id="floatingDesignation" name="designation_id" required>
                        <option value="">Select Designation</option>
                        @foreach($designations as $designation)
                            <option value="{{ $designation->id }}" {{ old('designation_id') == $designation->id ? 'selected' : '' }}>{{ $designation->designation }}</option>
                        @endforeach
                    </select>
                    <label for="floatingDesignation">Designation</label>
                    @error('designation_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-floating">
                    <textarea class="form-control @error('address') is-invalid @enderror" placeholder="Address" id="floatingAddress" name="address" style="height: 100px;">{{ old('address') }}</textarea>
                    <label for="floatingAddress">Address</label>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="floatingCountry" name="country" placeholder="Country" value="{{ old('country') }}">
                    <label for="floatingCountry">Country</label>
                    @error('country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="number" class="form-control @error('salary') is-invalid @enderror" id="floatingSalary" name="salary" placeholder="Salary" value="{{ old('salary') }}">
                    <label for="floatingSalary">Salary</label>
                    @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="floatingDateOfBirth" name="DOB" placeholder="Date of Birth" value="{{ old('date_of_birth') }}" required>

                    <label for="floatingDateOfBirth">Date of Birth</label>
                    @error('date_of_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                <input type="text" class="form-control @error('age') is-invalid @enderror" id="floatingAge" name="age" placeholder="Age" value="{{ old('age') }}" readonly>

                    <label for="floatingAge">Age</label>
                    @error('age')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <!-- Gender Dropdown -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-control @error('gender') is-invalid @enderror" id="floatingGender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    <label for="floatingGender">Gender</label>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Company Code -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('company_code') is-invalid @enderror" id="floatingCompanyCode" name="company_code" placeholder="Company Code" value="{{ old('company_code') }}">
                    <label for="floatingCompanyCode">Company Code</label>
                    @error('company_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Image -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="floatingImage" name="image" accept="image/*">
                    <label for="floatingImage">Image</label>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- CNIC -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('cnic') is-invalid @enderror" id="floatingCnic" name="cnic" placeholder="CNIC" value="{{ old('cnic') }}">
                    <label for="floatingCnic">CNIC</label>
                    @error('cnic')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- CNIC Expiry -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="date" class="form-control @error('cnic_expiry') is-invalid @enderror" id="floatingCnicExpiry" name="cnic_expiry" value="{{ old('cnic_expiry') }}">
                    <label for="floatingCnicExpiry">CNIC Expiry</label>
                    @error('cnic_expiry')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Portal Attendance -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-control @error('portal_attendance') is-invalid @enderror" id="floatingPortalAttendance" name="portal_attendance" required>
                        <option value="">Select Portal Attendance</option>
                        <option value="Manual" {{ old('portal_attendance') == 'Manual' ? 'selected' : '' }}>Manual</option>
                        <option value="Online" {{ old('portal_attendance') == 'Online' ? 'selected' : '' }}>Online</option>
                    </select>
                    <label for="floatingPortalAttendance">Portal Attendance</label>
                    @error('portal_attendance')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Emp Status -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-control @error('emp_status') is-invalid @enderror" id="floatingEmpStatus" name="emp_status" required>
                        <option value="">Select Status</option>
                        <option value="Active" {{ old('emp_status') == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ old('emp_status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    <label for="floatingEmpStatus">Employee Status</label>
                    @error('emp_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Emp Type -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('emp_type') is-invalid @enderror" id="floatingEmpType" name="emp_type" placeholder="Employee Type" value="{{ old('emp_type') }}">
                    <label for="floatingEmpType">Employee Type</label>
                    @error('emp_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Experience -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('experience') is-invalid @enderror" id="floatingExperience" name="experience" placeholder="Experience" value="{{ old('experience') }}">
                    <label for="floatingExperience">Experience</label>
                    @error('experience')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Qualification -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('qualification') is-invalid @enderror" id="floatingQualification" name="qualification" placeholder="Qualification" value="{{ old('qualification') }}">
                    <label for="floatingQualification">Qualification</label>
                    @error('qualification')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Shift Dropdown -->
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-control @error('shift_id') is-invalid @enderror" id="floatingShift" name="shift_id" required>
                        <option value="">Select Shift</option>
                        @foreach($shifts as $shift)
                            <option value="{{ $shift->id }}" {{ old('shift_id') == $shift->id ? 'selected' : '' }}>{{ $shift->shift_name }}</option>
                        @endforeach
                    </select>
                    <label for="floatingShift">Shift</label>
                    @error('shift_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- HOD ID -->
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('hod_id') is-invalid @enderror" id="floatingHodId" name="hod_id" placeholder="HOD ID" value="{{ old('hod_id') }}">
                    <label for="floatingHodId">HOD ID</label>
                    @error('hod_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>




            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
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
document.getElementById('floatingDateOfBirth').addEventListener('input', function() {
    const dateOfBirth = this.value;
    const age = calculateAge(dateOfBirth);
    document.getElementById('floatingAge').value = age;
});
</script>
@endsection

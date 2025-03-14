<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // The model for the employee
use App\Models\Designation;
use App\Models\Department;
use App\Models\Shift; // Import the Shift model
use Carbon\Carbon;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the employees.
     */
    public function index(Request $request)

    {
        $query = Employee::where('status', 1);
        $employees = $query->paginate(5);
        $currentDate = Carbon::now();
        return view('employees.index', compact('employees','currentDate'));
    }
    
    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        $shifts = Shift::all();  
        return view('employees.create', compact('departments', 'designations', 'shifts'));
    }

    public function store(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'emp_code' => 'required|string|max:50|unique:tbl_employee,emp_code',
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'username' => 'required|string|max:50',
        'email' => 'required|email|max:50|unique:tbl_employee,email',
        'password' => 'required|string|min:8',
        'joining_date' => 'nullable|date',
        'department_id' => 'nullable|integer',
        'designation_id' => 'nullable|integer',
        'gender' => 'nullable|string|max:10',
        'phone' => 'nullable|string|max:20',
        'company_code' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:150',
        'country' => 'nullable|string|max:50',
        'salary' => 'nullable|numeric',
        'DOB' => 'nullable|date',  // DOB validation
        'cnic' => 'nullable|string|max:20|unique:tbl_employee,cnic',
        'cnic_expiry' => 'nullable|date',
        'portal_attendance' => 'nullable|string|max:20',
        'resignation_date' => 'nullable|date',
        'emp_status' => 'nullable|string|max:20',
        'emp_type' => 'nullable|string|max:20',
        'experience' => 'nullable|string|max:50',
        'qualification' => 'nullable|string|max:50',
        'shift_id' => 'nullable|integer',
        'hod_id' => 'nullable|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image
    ]);

    // Set STATUS as 1 for active
    $validated['STATUS'] = 1;

    // Calculate age based on DOB if it exists
    if (!empty($validated['DOB'])) {
        $dob = Carbon::parse($validated['DOB']); // Use Carbon to parse the DOB
        $validated['age'] = $dob->age;  // Calculate age dynamically
    }

    // Create the new employee record (without the image)
    $employee = Employee::create($validated);

    // Handle image upload if exists (after the employee is created and has an ID)
    if ($request->hasFile('image')) {
        $imageName = $employee->emp_code . '_' . $request->image->extension(); 
        $request->image->move(public_path('images/employee'), $imageName);
        
        // Update employee record with the image name
        $employee->image = $imageName;
        $employee->save();
    }

    // Redirect to employee index page with success message
    return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
}


    // View Employee Details
    public function view($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.view', compact('employee'));
    }

    // Edit Employee Details
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $designations = Designation::all();
        $shifts = Shift::all(); // Get all shifts for dropdown
        return view('employees.edit', compact('employee', 'departments', 'designations', 'shifts'));
    }

    // Update Employee Details
    public function update(Request $request, $id)
{
    $employee = Employee::findOrFail($id);

    // Validate incoming data
    $validated = $request->validate([
        'emp_code' => 'required|string|max:50|unique:tbl_employee,emp_code,' . $employee->id,
        'first_name' => 'required',
        'last_name' => 'required',
        'username' => 'required',
        'email' => 'required|email|max:50|unique:tbl_employee,email,' . $employee->id,
        'age' => 'nullable|integer',
        'phone' => 'nullable|string',
        'address' => 'nullable|string',
        'country' => 'nullable|string',
        'salary' => 'nullable|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Image validation
        'joining_date' => 'nullable|date',
        'department_id' => 'nullable|integer',
        'designation_id' => 'nullable|integer',
        'gender' => 'nullable|string|max:10',
        'cnic' => 'nullable|string|max:20|unique:tbl_employee,cnic,' . $employee->id,
        'cnic_expiry' => 'nullable|date',
        'experience' => 'nullable|string|max:50',
        'qualification' => 'nullable|string|max:50',
        'shift_id' => 'nullable|integer',
        'emp_status' => 'nullable|string|max:20',
        'emp_type' => 'nullable|string|max:20',
    ]);

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($employee->image && file_exists(public_path('images/employee/' . $employee->image))) {
            unlink(public_path('images/employee/' . $employee->image));
        }

        // Store new image
        $imageName = $employee->emp_code . '_' . $request->image->extension();  
        $request->image->move(public_path('images/employee'), $imageName);

        // Update the image in the validated data
        $validated['image'] = $imageName;
    }

    // Calculate age based on DOB if it exists
    if ($request->has('DOB') && $request->DOB) {
        $dob = Carbon::parse($request->DOB);
        $validated['age'] = $dob->age;
    }

    // Update other employee fields
    $employee->update($validated);

    return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
}



    // Delete Employee (soft delete)
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        // Set status to 0 to mark as deleted
        $employee->status = 0;
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee deactivated successfully!');
    }
}

<?php

// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Shift; 
use Carbon\Carbon;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'tbl_employee';
    protected $primaryKey = 'id';

    protected $fillable = [
        'emp_code',
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'joining_date',
        'department_id',
        'designation_id',
        'gender',
        'phone',
        'company_code',
        'image',
        'address',
        'country',
        'salary',
        'DOB',
        'age',
        'cnic',
        'cnic_expiry',
        'portal_attendance',
        'resignation_date',
        'emp_status',
        'emp_type',
        'experience',
        'qualification',
        'shift_id',
        'hod_id',
        'created_by',
        'updated_by',
        'STATUS',
    ];

    public $timestamps = false;

    // Define the relationship with the Department model
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    // Define the relationship with the Designation model
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id', 'id');
    }

    // Relationship with Shift model
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id', 'id');
    }

    public function getAgeAttribute()
    {
        // Check if DOB is not null
        if ($this->DOB) {
            return Carbon::parse($this->DOB)->age; // Calculate age from DOB
        }

        // Return null if DOB is not set
        return null;
    }

    
}

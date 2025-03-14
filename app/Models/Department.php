<?php

// app/Models/Department.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Department extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'tbl_department';

    // Define fillable fields
    protected $fillable = [
        'department_name',
        'created_on',
        'created_by',
        'updated_on',
        'updated_by',
    ];

    // Define the relationship with the Employee model
    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'id');
    }
}

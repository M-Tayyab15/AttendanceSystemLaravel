<?php

// app/Models/Designation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    // Specify the table name if it's not following Laravel's convention
    protected $table = 'tbl_designation';

    // Specify the fillable fields
    protected $fillable = [
        'designation',
        'created_by',
        'updated_by'
    ];

    // If you want to disable timestamps, set them to false
    public $timestamps = true;

    // Define the relationship with the Employee model
    public function employees()
    {
        return $this->hasMany(Employee::class, 'designation_id', 'id');
    }
}


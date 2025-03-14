<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'tbl_shift';
    protected $primaryKey = 'id';

    protected $fillable = [
        'shift_name',
        'in_time',
        'out_time',
        'grace_time',
    ];

    public $timestamps = false;
}

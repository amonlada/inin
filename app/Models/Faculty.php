<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $table = 'faculty';
    
    protected $fillable = [
        'faculty_name',
        'faculty_address',
        'faculty_phone',
        'faculty_executive',
        'faculty_position',
        'faculty_year',
        'faculty_email',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;
    protected $table = 'branch';
    
    protected $fillable = [
        'branch_name',
        'branch_phone',
        'brannch_Code',
        'id_faculty',
       
    ];
}
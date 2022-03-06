<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $table = 'teacher';
    
    protected $fillable = [
        'teacher_name',
        'teacher_room',
        'teacher_phone',
        'teacher_email',
        'id_branch	',
       
     ];
} 
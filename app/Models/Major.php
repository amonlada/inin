<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class major extends Model
{
    use HasFactory;
    protected $table = 'major';
    
    protected $fillable = [
        'major_name	',
        'major_numberofcredits',
        'major_money',
        'major_mainsubject',
        'id_branch',
       
    ];
}

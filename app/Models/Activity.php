<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Activity extends Model
{
    use HasFactory;

    protected $table = 'activity';
    
    protected $fillable = [
        'activity_date',
        'activity_name',
        'activity_number',
        'activity_details',
        'activity_type',
        'activity_responsible',
        'activity_year',
        'activity_apply',
        'activity_numberofcredits'
    ];
}
 
 
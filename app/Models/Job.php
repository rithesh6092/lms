<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'link',
        'company_name',
        'status',
        'application_start_date',
        'application_end_date',
    ];

    protected $casts = [
        'application_start_date' => 'date',
        'application_end_date' => 'date',
    ];
} 
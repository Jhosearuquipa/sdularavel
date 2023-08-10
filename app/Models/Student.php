<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'method',
        'user_type',
        'cuil',
        'firstname',
        'lastname',
        'work_email',
        'ministerio',
        'reparticion',
        'contract_type',
        'area',
        'manager',
        'email',
        'phone',
        'mobile',
        'regimen',
        'provincia',
        'active',
        'leave_date',
    ];
}

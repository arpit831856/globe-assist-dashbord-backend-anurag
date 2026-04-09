<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Partner extends Authenticatable
{
    use HasFactory;

    protected $guard = 'partner';
    protected $fillable = [
        'full_name',
        'mobile',
        'email',
        'company',
        'type',
        'location',
        'country',
        'status',
        'joined_at',
        'description',
        'photo',
        'aadhar_card',
        'pan_card',
        'cv_resume',
        'previous_work',
        'partner_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerProfile extends Model
{
    protected $fillable = [
        'partner_id',
        'business_name',
        'bio',
        'experience',
        'projects_completed',
        'service_areas',
        'languages',
        'phone',
        'email',
        'rating',
        'reviews_count',
        'skill_tags',
        'profile_photo'
    ];
}
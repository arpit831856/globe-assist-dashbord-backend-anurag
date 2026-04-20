<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerService extends Model
{
    protected $fillable = [
        'partner_id',
        'service_id',
        'category',
        'status',
        'title',
        'description',
        'price',
        'availability',
        'location',
        'experience_years',
        'team_size',
        'languages',
        'highlights',
        'photos',
         'service_date',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'photos' => 'array',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}

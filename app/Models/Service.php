<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'name',
        'category',
        'price_type',
        'base_price',
        'icon',
        'image',
        'location_coverage',
        'status',
        'featured',
        'short_description',
        'description'
    ];

    public function partnerServices()
    {
        return $this->hasMany(PartnerService::class, 'service_id');
    }
}

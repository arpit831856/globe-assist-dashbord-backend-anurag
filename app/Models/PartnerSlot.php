<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerSlot extends Model
{
    protected $fillable = [
        'partner_id',
        'day',
        'start_time',
        'end_time',
        'location',
        'status'
    ];

     public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }
}
        

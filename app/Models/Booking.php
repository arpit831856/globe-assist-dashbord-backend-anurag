<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'service_id',
        'booking_date',
        'location',
        'requirements',
        'partner_id',
        'service_name',
        'name',
        'phone',
        'email',
        'budget',
        'status',
        'payment_status',
        'assigned_at',
        'completed_at',
        'start_time',
        'end_time'


    ];

    // Booking.php

public function service()
{
    return $this->belongsTo(Service::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
}

        

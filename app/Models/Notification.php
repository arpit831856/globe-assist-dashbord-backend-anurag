<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_id',
        'date_time',
        'image',
        'recipient_code',
        'title',
        'message',
        'type',
        'status',
    ];

    protected $casts = [
        'date_time' => 'datetime',
    ];
}

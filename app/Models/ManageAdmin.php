<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class ManageAdmin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'manage_admins';

    protected $fillable = [
        'sr_no',
        'photo',
        'name',
        'email',
        'password',
        'role',
        'last_login',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'last_login' => 'datetime',
    ];
}

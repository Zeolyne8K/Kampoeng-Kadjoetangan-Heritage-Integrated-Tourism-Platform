<?php

namespace App\Models;

// Penting: Import Authenticatable agar bisa dipakai login
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'email',
        'password',
        'is_active',
        'role',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', 
        'is_active' => 'boolean',
        'last_login_at' => 'datetime',
    ];
}
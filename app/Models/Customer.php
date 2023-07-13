<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    const IMAGE_PATH = 'frontend/profileimage/';
    protected $fillable = [
        'profile_image',
        'uuid',
        'name',
        'email',
        'phone',
        'birthdate',
        'address',
        'shipping_address',
        'password',
        'status',
        'login_at',
        'register_at',
        'deleted_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_dob',
        'customer_email',
        'customer_password',
        'customer_address',
        'customer_city',
        'customer_avatar',
        'customer_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'customer_password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'customer_dob' => 'datetime',
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'customer_id';

    /**
     * @var string
     */
    protected $table = 'customers';
}

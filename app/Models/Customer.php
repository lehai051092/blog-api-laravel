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
        'customer_first_name',
        'customer_last_name',
        'customer_email',
        'customer_password',
        'customer_dob',
        'customer_phone',
        'customer_image',
        'customer_address',
        'customer_district_id',
        'customer_city_id',
        'customer_country_id',
        'customer_role_id',
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

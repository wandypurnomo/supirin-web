<?php

namespace App\Models;

use App\Traits\Geographical;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Optix\Media\HasMedia;
use Wandxx\Support\Traits\UuidForKey;

class User extends Authenticatable
{
    use Notifiable, UuidForKey, Geographical, HasMedia;

    const LATITUDE = 'lat';
    const LONGITUDE = 'lng';

    protected $guarded = ['id'];
    public $incrementing = false;
    protected static $kilometers = true;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'data_verified_at' => 'datetime',
        'metadata' => 'array',
        'active' => 'boolean'
    ];

    public function clientOrders()
    {
        return $this->hasMany(Order::class, "client_id");
    }

    public function driverOrders()
    {
        return $this->hasMany(Order::class, "driver_id");
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->password = bcrypt($model->password);
        });
    }
}

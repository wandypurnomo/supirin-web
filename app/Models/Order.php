<?php

namespace App\Models;

use App\Constants\OrderStatus;
use App\Events\Order\OrderCanceled;
use App\Events\Order\OrderDone;
use App\Events\Order\OrderOnGoing;
use App\Events\Order\OrderPlaced;
use Envant\Fireable\FireableAttributes;
use Illuminate\Database\Eloquent\Model;
use Wandxx\Support\Traits\UuidForKey;

class Order extends Model
{
    use UuidForKey, FireableAttributes;

    protected $guarded = ['id'];
    public $incrementing = false;
    protected $casts = [
        "start_at" => "datetime",
        "end_at" => "datetime",
        "metadata" => "array"
    ];

    protected $fireableAttributes = [
        "status" => [
            OrderStatus::ON_GOING => OrderOnGoing::class,
            OrderStatus::CANCELED => OrderCanceled::class,
            OrderStatus::DONE => OrderDone::class,
        ]
    ];

    public function client()
    {
        return $this->belongsTo(User::class, "client_id");
    }

    public function driver()
    {
        return $this->belongsTo(User::class, "driver_id");
    }

    protected static function boot()
    {
        self::created(function ($model) {
            event(new OrderPlaced($model));
        });
    }
}

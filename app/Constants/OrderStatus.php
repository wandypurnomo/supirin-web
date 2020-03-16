<?php


namespace App\Constants;


use Wandxx\Support\Interfaces\ConstantInterface;
use Wandxx\Support\Traits\HasLabel;

class OrderStatus implements ConstantInterface
{
    use HasLabel;

    const REQUEST = 0;
    const PLACED = 1;
    const ON_GOING = 2;
    const CANCELED = 3;
    const DONE = 4;

    public static function labels(): array
    {
        return [
            self::REQUEST => "Request",
            self::PLACED => "Placed",
            self::ON_GOING => "On Going",
            self::CANCELED => "Canceled",
            self::DONE => "Done"
        ];
    }
}

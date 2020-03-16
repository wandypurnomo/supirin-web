<?php


namespace App\Constants;


use Wandxx\Support\Interfaces\ConstantInterface;
use Wandxx\Support\Traits\HasLabel;

class UserRole implements ConstantInterface
{
    use HasLabel;

    const USER = 1;
    const DRIVER = 2;

    public static function labels(): array
    {
        return [
            self::USER => "User",
            self::DRIVER => "Driver"
        ];
    }
}

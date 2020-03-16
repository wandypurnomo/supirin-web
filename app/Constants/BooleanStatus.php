<?php


namespace App\Constants;


use Wandxx\Support\Interfaces\ConstantInterface;
use Wandxx\Support\Traits\HasLabel;

class BooleanStatus implements ConstantInterface
{
    use HasLabel;

    const YES = 1;
    const NO = 0;

    public static function labels(): array
    {
        return [
            self::YES => "Yes",
            self::NO => "No",
        ];
    }
}

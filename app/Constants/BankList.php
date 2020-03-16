<?php


namespace App\Constants;


use Wandxx\Support\Interfaces\ConstantInterface;
use Wandxx\Support\Traits\HasLabel;

class BankList implements ConstantInterface
{
    use HasLabel;

    const BCA = 1;
    const BNI = 2;
    const BRI = 3;
    const PERMATA = 4;

    public static function labels(): array
    {
        return [
            self::BCA => 'BCA',
            self::BNI => 'BNI',
            self::BRI => 'BRI',
            self::PERMATA => 'PERMATA',
        ];
    }
}

<?php
namespace App\Enum;

class Duration
{
    const FIVE = 5;
    const TEN = 10;
    const FIFTEEN = 15;
    const TWENTY = 20;
    const TWENTY_FIVE = 25;
    const THIRTY = 30;
    const THIRTY_FIVE = 35;
    const FOURTY = 40;
    const FOURTY_FIVE = 45;
    const FIFTY = 50;
    const FIFTY_FIVE = 55;
    const SIXTY = 60;
    const NINETY = 90;
    const ONE_HUNDRED_TWENTY = 120;

    const DURATION_LIST = [
        self::FIVE,
        self::TEN,
        self::FIFTEEN,
        self::TWENTY,
        self::TWENTY_FIVE,
        self::THIRTY,
        self::THIRTY_FIVE,
        self::FOURTY,
        self::FOURTY_FIVE,
        self::FIFTY,
        self::FIFTY_FIVE,
        self::SIXTY,
        self::NINETY,
        self::ONE_HUNDRED_TWENTY,
    ];

    const DURATION_NAME = [
        self::FIVE => 'Five',
        self::TEN => 'Ten',
        self::FIFTEEN => 'Fifteen',
        self::TWENTY => 'Twenty',
        self::TWENTY_FIVE => 'Twenty five',
        self::THIRTY => 'Thirty',
        self::THIRTY_FIVE => 'Thirty five',
        self::FOURTY => 'Fourty',
        self::FOURTY_FIVE => 'Fourty five',
        self::FIFTY => 'Fifty',
        self::FIFTY_FIVE => 'Fifty five',
        self::SIXTY => 'Sixty',
        self::NINETY => 'Ninety',
        self::ONE_HUNDRED_TWENTY => 'One hundred and twenty',
    ];

    public static function getAsSelectOptions() : array
    {
        $duration = [];
        foreach(self::DURATION_LIST as $key) {
            $duration[$key] = __(self::DURATION_NAME[$key]);
        }

        return $duration;
    }
}   
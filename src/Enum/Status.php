<?php
namespace App\Enum;

class Status
{
    const OPEN = 'open';
    const FINISHED = 'finished';
    const CANCELED = 'canceled';

    const STATUS_LIST = [
        self::OPEN,
        self::FINISHED,
        self::CANCELED,
    ];

    const STATUS_NAME = [
        self::OPEN => 'Open',
        self::FINISHED => 'Finished',
        self::CANCELED => 'Canceled',
    ];

    public static function getAsSelectOptions() : array
    {
        $status = [];
        foreach(self::STATUS_LIST as $key) {
            $status[$key] = __(self::STATUS_NAME[$key]);
        }

        return $status;
    }
}   
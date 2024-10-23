<?php

namespace App\Helpers;

use Cake\Http\Response;

abstract class Helper {
    public static function getYearList(int|string $year = null) : array
    {
        $year = $year ?? date('Y');

        $yearList = [];
        for($i = (date('Y') - 5); $i <= (date('Y') + 5); $i++) {
            $yearList[] = $i;
        }

        return $yearList;
    }

    public static function getLeapYearList(array $yearList = null) : array
    {
        $yearList = $yearList ?? Helper::getYearList();

        $leapYear = [];
        foreach($yearList as $year) {
            if ($year % 4 === 0) {
                $leapYear[] = $year;
            }
        }

        return $leapYear;
    }

    public static function getMonthList() : array
    {
        $monthList = [];
        for($i = 1; $i <= 12; $i++) {
            $monthList[$i] = __(date('F', mktime(0, 0, 0, $i, 10)));
        }

        return $monthList;
    }

    public static function getDayList() : array
    {
        return [
            31 => [1, 3, 5, 7, 8, 10, 12],
            30 => [4, 6, 9, 11],
            29 => Helper::getLeapYearList(),
        ];
    }

    public static function responseJson($caller, $data) : Response 
    {
        return $caller->response->withType("application/json")->withStringBody(json_encode($data));
    }
}
<?php

use Carbon\Carbon;

function getMonth($courseDates, $monthArray)
{
    if (!empty($courseDates)) {
        foreach ($courseDates as $unformatDate) {
            $date = ($unformatDate->created_at);
            $monthNo = $date->format('m');
            $monthName = $date->format('M');
            $monthArray[$monthNo] = $monthName;
        }
    }

    return $monthArray;
}

function getAllMonth()
{
    $monthAll = config('training.Month');

    return $monthAll;
}

function maxNo($max_no)
{
    $max = round(($max_no + 10 / 2) / 10) * 10;
}

function getYear($courseYear)
{
    $yearArray = array();
    if (!empty($courseYear)) {
        foreach ($courseYear as $unformatDate) {
            $date = ($unformatDate->start_date);
            $date = Carbon::create($date);
            $yearNo = $date->format('y');
            $yearName = $date->format('Y');
            $yearArray[$yearNo] = $yearName;
        }
    }

    return $yearArray;
}

function getNow()
{
    $timeNow = Carbon::now('Asia/Ho_Chi_Minh');
    return $timeNow;
}

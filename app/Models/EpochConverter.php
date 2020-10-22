<?php

namespace App\Models;


use Carbon\Carbon;

class EpochConverter
{
    public function getDateFromTimestamp($timeStamp){
        $length = strlen($timeStamp);

        if($length > 10 && $length <13 ) {
            $timeStamp = substr($timeStamp, 0, 10-$length);
        } elseif($length == 13) {
            return [
                'unit' => 'milliseconds',
                'gmt' => Carbon::createFromTimestampMsUTC($timeStamp)->toCookieString(),
                'local' => Carbon::createFromTimestampMs($timeStamp)->toCookieString(),
                'relative' => Carbon::createFromTimestampMs($timeStamp)->diffForHumans()
            ];
        }

        return [
            'unit' => 'seconds',
            'gmt' => Carbon::createFromTimestampUTC($timeStamp)->toCookieString(),
            'local' => Carbon::createFromTimestamp($timeStamp)->toCookieString(),
            'relative' => Carbon::createFromTimestamp($timeStamp)->diffForHumans()
        ];
    }

    public function getTimestampFromDate($date, $timeZone)
    {
        switch ($timeZone) {
            case 'local' :
                $date = Carbon::parse($date);
                return Carbon::parse($date, $date->getTimezone())->getTimestamp();
                break;
            default:
                return Carbon::parse($date, 'UTC')->getTimestamp();
        }
    }

    public function getFirstAndLastOfInterval($params)
    {
        $tz = $params['timezone'] == 'local' ? null : $params['timezone'];

        switch ($params['format']) {
            case 'year' :
                $date = Carbon::create($year = $params['year'], $month = 1, $day = 1, $hour = 0, $minute = 0, $second = 0, $tz);
                $start = Carbon::parse($date)->startOfYear();
                $end = Carbon::parse($date)->endOfYear();
                break;
            case 'month' :
                $date = Carbon::create($year = $params['year'], $month = $params['month'], $day = 1, $hour = 0, $minute = 0, $second = 0, $tz);
                $start = Carbon::parse($date)->startOfMonth();
                $end = Carbon::parse($date)->endOfMonth();
                break;
            case 'day' :
                $date = Carbon::create($year = $params['year'], $month = $params['month'], $day = $params['day'], $hour = 0, $minute = 0, $second = 0, $tz);
                $start = Carbon::parse($date)->startOfDay();
                $end = Carbon::parse($date)->endOfDay();
                break;
        }
        return [
            'start_date' => $start->toCookieString(),
            'start_timestamp' => $start->getTimestamp(),
            'end_date' => $end->toCookieString(),
            'end_timestamp' => $end->getTimestamp()
        ];
    }
}

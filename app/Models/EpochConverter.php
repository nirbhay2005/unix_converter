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

    public function getTimestampFromDate($date, $timeZone){
        switch ($timeZone){
            case 'local' :
                $date = Carbon::parse($date);
                return Carbon::parse($date, $date->getTimezone())->getTimestamp();
                break;
            default:
                return Carbon::parse($date, 'UTC')->getTimestamp();
        }
    }
}

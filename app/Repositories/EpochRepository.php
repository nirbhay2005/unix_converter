<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/4/20
 * Time: 1:26 AM
 */

namespace App\Repositories;

use Carbon\Carbon;
use Exception;
use Luezoid\Laravelcore\Repositories\EloquentBaseRepository;

class EpochRepository extends EloquentBaseRepository
{
    public function getDateFromTimestamp($data)
    {
        $timeStamp = $data['data']['timestamp'];
        $length = strlen($timeStamp);

        if ($length > 10 && $length < 13) {
            $timeStamp = substr($timeStamp, 0, 10 - $length);
        } elseif ($length == 13) {
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

    public function getTimestampFromDate($data)
    {
        switch ($data['data']['timezone']) {
            case 'local' :
                $date = Carbon::parse($data['data']['date']);
                $timestamp = Carbon::parse($date, $date->getTimezone())->getTimestamp();
                break;
            default:
                $timestamp = Carbon::parse($data['data']['date'], 'UTC')->getTimestamp();
        }

        return [
            'timestamp' => $timestamp,
            'gmt' => Carbon::createFromTimestampUTC($timestamp)->toCookieString(),
            'local' => Carbon::createFromTimestamp($timestamp)->toCookieString(),
        ];
    }

    public function getTimestampFromHumanDate($data)
    {
        try {
            $timestamp = Carbon::parse($data['data']['date'])->getTimestamp();
            return [
                'status' => true,
                'timestamp' => $timestamp,
                'gmt' => Carbon::createFromTimestampUTC($timestamp)->toCookieString(),
                'local' => Carbon::createFromTimestamp($timestamp)->toCookieString(),
            ];
        } catch (Exception $e) {
            return [
                'status' => false,
                'timestamp' => 'Sorry, Can\'t parse this date'
            ];
        }
    }

    public function getBeginEndOfInterval($params)
    {
        $tz = $params['data']['timezone'] == 'local' ? null : $params['data']['timezone'];
        switch ($params['data']['format']) {
            case 'year' :
                $date = $params['data']['date'];
                $start = Carbon::parse($date, $tz)->startOfYear();
                $end = Carbon::parse($date, $tz)->endOfYear();
                break;
            case 'month' :
                $date = $params['data']['date'];
                $start = Carbon::parse($date, $tz)->startOfMonth();
                $end = Carbon::parse($date, $tz)->endOfMonth();
                break;
            case 'day' :
                $date = $params['data']['date'];
                $start = Carbon::parse($date, $tz)->startOfDay();
                $end = Carbon::parse($date, $tz)->endOfDay();
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

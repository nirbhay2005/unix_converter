<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/4/20
 * Time: 1:26 AM
 */

namespace App\Repositories;

use App\Models\EpochConverter;
use Carbon\Carbon;
use Luezoid\Laravelcore\Repositories\EloquentBaseRepository;

class UnixRepository extends EloquentBaseRepository
{
    public $model = EpochConverter::class;

    public function getDateFromUnix($params){
        $timeStamp = $params['inputs']['time_stamp'];
        $length = strlen($timeStamp);

        if($length > 10 && $length <13 ) {
            $timeStamp = substr($timeStamp, 0, 10-$length);
        } elseif($length == 13) {
            return [
                'gmt' => Carbon::createFromTimestampMsUTC($timeStamp)->toCookieString(),
                'local' => Carbon::createFromTimestampMs($timeStamp)->toCookieString()
            ];
        }

        return [
            'gmt' => Carbon::createFromTimestampUTC($timeStamp)->toCookieString(),
            'local' => Carbon::createFromTimestamp($timeStamp)->toCookieString()
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeginEndDateRequest;
use App\Http\Requests\DateToTimestampRequest;
use App\Http\Requests\TimestampToDateRequest;
use App\Http\Requests\TimezoneConvertRequest;
use App\Models\EpochConverter;
use App\Repositories\EpochRepository;
use Illuminate\Http\Request;
use Luezoid\Laravelcore\Http\Controllers\ApiController;
use Luezoid\Laravelcore\Jobs\BaseJob;

class EpochController extends ApiController
{
    protected $repository = EpochRepository::class;

    public function getDateFromTimestamp(Request $request)
    {
        $this->jobMethod = 'getDateFromTimestamp';
        $this->customRequest = TimestampToDateRequest::class;
        return $this->handleCustomEndPoint(BaseJob::class, $request);
    }

    public function getTimestampFromDate(Request $request)
    {
        $this->jobMethod = 'getTimestampFromDate';
        $this->customRequest = DateToTimestampRequest::class;
        return $this->handleCustomEndPoint(BaseJob::class, $request);
    }

    public function getTimestampFromHumanDate(Request $request)
    {
        $this->jobMethod = 'getTimestampFromHumanDate';
        return $this->handleCustomEndPoint(BaseJob::class, $request);
    }

    public function getBeginEndOfInterval(BeginEndDateRequest $request, EpochConverter $converter)
    {

        $this->jobMethod = 'getBeginEnd';
        $this->customRequest = BeginEndDateRequest::class;
        return $this->handleCustomEndPoint(BaseJob::class, $request);
    }

    public function getDateForTimezone(Request $request)
    {
        $this->jobMethod = 'getDateForTimezone';
        $this->customRequest = TimezoneConvertRequest::class;
        return $this->handleCustomEndPoint(BaseJob::class, $request);
    }
}

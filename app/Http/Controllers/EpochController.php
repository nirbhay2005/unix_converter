<?php

namespace App\Http\Controllers;

use App\Http\Requests\DateToTimestampRequest;
use App\Http\Requests\FirstAndLastDateRequest;
use App\Http\Requests\TimestampToDateRequest;
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

    public function getFirstAndLastOfInterval(FirstAndLastDateRequest $request, EpochConverter $converter)
    {

        $this->jobMethod = 'getFirstAndLastOfInterval';
        $this->customRequest = FirstAndLastDateRequest::class;
        return $this->handleCustomEndPoint(BaseJob::class, $request);
    }
}

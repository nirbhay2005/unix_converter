<?php

namespace App\Http\Controllers;

use App\Http\Requests\DateToTimestampRequest;
use App\Http\Requests\FirstAndLastDateRequest;
use App\Http\Requests\TimestampToDateRequest;
use App\Models\EpochConverter;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class EpochController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getDateFromTimestamp(TimestampToDateRequest $request, EpochConverter $converter)
    {
        $validated = $request->validated();
        $timeStamp = $validated['timestamp'];
        $result = $converter->getDateFromTimestamp($timeStamp);

        return view('epoch_converter', [
            'timestamp' => $timeStamp,
            'date' => $result,
        ]);
    }

    public function getTimestampFromDate(DateToTimestampRequest $request, EpochConverter $converter)
    {
        $validated = $request->validated();
        $result['timestamp'] = $converter->getTimestampFromDate($validated['date'], $validated['tz']);
        $result += $converter->getDateFromTimestamp($result['timestamp']);

        return view('epoch_converter', [
            'stamp' => $result['timestamp'],
            'gmt' => $result['gmt'],
            'local' => $result['local']
        ]);
    }

    public function getTimestampFromHumanDate(Request $request, EpochConverter $converter)
    {
        try {
            $result['timestamp'] = $converter->getTimestampFromDate(Carbon::parse($request->input('date') ?? 'null'), 'UTC');
        } catch (Exception $e) {
            return view('home', [
                'message' => 'Sorry, Can\'t parse this date'
            ]);
        }
        $result += $converter->getDateFromTimestamp($result['timestamp']);

        return view('epoch_converter', [
            'stamp1' => $result['timestamp'],
            'gmt1' => $result['gmt'],
            'local1' => $result['local'],
            'humanDate' => $request->input('date')
        ]);
    }

    public function getFirstAndLastOfInterval(FirstAndLastDateRequest $request, EpochConverter $converter)
    {
        $result = $converter->getFirstAndLastOfInterval($request->validated());
        return view('epoch_converter', [
            'format' => $request->input('format'),
            'startDate' => $result['start_date'],
            'startTimestamp' => $result['start_timestamp'],
            'endDate' => $result['end_date'],
            'endTimestamp' => $result['end_timestamp']
        ]);
    }
}

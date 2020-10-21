<?php

namespace App\Http\Controllers;

use App\Models\EpochConverter;
use Carbon\Carbon;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TimestampController extends Controller
{
    public function index()
    {
        return view('time_converter');
    }

    public function getDateFromTimestamp(Request $request, EpochConverter $converter)
    {
        $validator = Validator::make($request->all(),[
            'timestamp' => 'required|integer|digits_between:1,13',
        ]);

        if ($validator->fails()) {
            return view('time_converter')->withErrors($validator); // <----- Send the validator here
        } else{
            $timeStamp = $request->input('timestamp');
            $result = $converter->getDateFromTimestamp($timeStamp);

            return view('time_converter', [
                'timestamp' => $timeStamp,
                'date' => $result,
            ]);
        }
    }

    public function getTimestampFromDate(Request $request, EpochConverter $converter)
    {
        $validator = Validator::make($request->all(),[
            'year' => 'bail|required|numeric|digits:4',
            'month' => 'required|numeric|digits_between:1,2|min:1|max:12',
            'day' => 'required|numeric|digits_between:1,2|min:1|max:31',
            'hr' => 'required|numeric|digits:2|max:23',
            'min' => 'required|numeric|digits:2|max:59',
            'sec' => 'required|numeric|digits:2|max:59',
            'timezone' => ['required',
                Rule::in(['gmt', 'local'])
                ]
        ]);

        if ($validator->fails()) {
            return view('time_converter')->withErrors($validator); // <----- Send the validator here
        } else{
            $date = Carbon::createSafe(
                intval($request->input('year')),
                intval($request->input('month')),
                intval($request->input('day')),
                intval($request->input('hr')),
                intval($request->input('min')),
                intval($request->input('sec')),
                $request->input('timezone')=='local'? null : $request->input('timezone')
            );

            $timeZone = $request->input('timezone');
            $result['timestamp'] = $converter->getTimestampFromDate($date, $timeZone);
            $result += $converter->getDateFromTimestamp($result['timestamp']);

            return view('time_converter', [
               'stamp' => $result['timestamp'],
               'gmt' => $result['gmt'],
               'local' => $result['local'],
               'datetime' => $date
            ]);
        }
    }

    public function getTimestampFromHumanDate(Request $request, EpochConverter $converter) {
        try {
            $result['timestamp'] = $converter->getTimestampFromDate(Carbon::parse($request->input('date') ?? 'null'), 'UTC');
            $result += $converter->getDateFromTimestamp($result['timestamp']);

            return view('time_converter', [
                'stamp1' => $result['timestamp'],
                'gmt1' => $result['gmt'],
                'local1' => $result['local'],
                'humanDate' => $request->input('date')
            ]);
        } catch (\Exception $e) {
            return view('time_converter', [
                'error' => 'Sorry, Can\'t parse this date'
            ]);
        }
    }
}

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Epoch Converter</title>
</head>
<body>
<h1>Epoch Converter</h1>

<form method="POST" action="/date">
    @csrf
    <input type="text" name="timestamp" value="{{\Carbon\Carbon::now('GMT')->getTimestamp()}}">
    <button type="submit">Timestamp to Human Date</button>
    <p>Supports Unix Timestamps in seconds and milliseconds.</p>
    @if ($errors->first('timestamp'))
        <ul>
            <li>{{ $errors->first('timestamp') }}</li>
        </ul>
    @endif

    @if (isset($date))
        <p>Assuming that this timestamp is in {{ $date['unit'] }}:</p>
        <p>GMT : {{ $date['gmt'] }}</p>
        <p>Your Timezone: {{ $date['local'] }}</p>
        <p>Relative : {{$date['relative']}}</p>
    @endif
</form>
<br>
<br>
<form method="POST" action="/timestamp">
    @csrf
    <div>
        <table>
            <tbody>
            <tr>
                <td>Yr</td>
                <td>Mon</td>
                <td>Day</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="yr" size="4" maxlength="4"
                           value="{{\Carbon\Carbon::now('GMT')->get('year')}}">
                    <span>-</span>
                </td>
                <td>
                    <input type="text" name="mon" size="2" maxlength="2"
                           value="{{\Carbon\Carbon::now('GMT')->get('month')}}">
                    <span>-</span>
                </td>
                <td>
                    <input type="text" name="day" size="2" maxlength="2"
                           value="{{\Carbon\Carbon::now('GMT')->get('day')}}">
                </td>
            </tr>
            </tbody>
        </table>
        <table>
            <tbody>
            <tr>
                <td>Hr</td>
                <td>Min</td>
                <td>Sec</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="hr" size="2" maxlength="2"
                           value="{{\Carbon\Carbon::now('GMT')->get('hour')}}">
                    <span>:</span>
                </td>
                <td>
                    <input type="text" name="min" size="2" maxlength="2"
                           value="{{\Carbon\Carbon::now('GMT')->get('minute')}}">
                    <span>:</span>
                </td>
                <td>
                    <input type="text" name="sec" size="2" maxlength="2"
                           value="{{\Carbon\Carbon::now('GMT')->get('second')}}">
                </td>
            </tr>
            </tbody>
        </table>
        <select name=tz>
            <option value="gmt" selected>GMT</option>
            <option value="local">Local</option>
        </select>
        <button type="submit">Human Date to Timestamp</button>
    </div>

    @if ($errors->hasAny(['yr', 'mon', 'day', 'hr', 'min', 'sec', 'tz']))
        <ul>
            <li>{{ $errors->first() }}</li>
        </ul>
    @endif

    @if (isset($stamp))
        <p>Epoch Timestamp : {{ $stamp }}</p>
        <p>Timestamp in milliseconds: {{ $stamp*1000 }}</p>
        <p>Date and Time (GMT) : {{$gmt}}</p>
        <p>Date and Time (Your Timezone) : {{$local}}</p>
    @endif
</form>
<br>
<br>
<form method="POST" action="/time-stamp">
    @csrf
    <input type="text" name="date" size="30" value="{{\Carbon\Carbon::now('GMT')->toCookieString()}}">
    <button type="submit">Human Date to Timestamp</button>
    @if (isset($error))
        <p> {{ $error }}</p>
    @endif
    @if (isset($stamp1))
        <p>Epoch Timestamp : {{ $stamp1 }}</p>
        <p>Timestamp in milliseconds: {{ $stamp1*1000 }}</p>
        <p>Date and Time (GMT) : {{$gmt1}}</p>
        <p>Date and Time (Your Timezone) : {{$local1}}</p>
    @endif
</form>
<br>
<br>
<h1>Epoch Dates for the start and end of year/month/day</h1>
<form method="POST" action="/dates">
    @csrf
    <input type="radio" name="format" value="year">
    <label for="year">Year</label>
    <input type="radio" name="format" checked value="month">
    <label for="month">Month</label>
    <input type="radio" name="format" value="day">
    <label for="day">Day</label>
    <br>
    <div>
        <table>
            <tbody>
            <tr>
                <td>Yr</td>
                <td>Mon</td>
                <td>Day</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="year" size="4" maxlength="4"
                           value="{{\Carbon\Carbon::now('GMT')->get('year')}}">
                    <span>-</span>
                </td>
                <td>
                    <input type="text" name="month" size="2" maxlength="2"
                           value="{{\Carbon\Carbon::now('GMT')->get('month')}}">
                    <span>-</span>
                </td>
                <td>
                    <input type="text" name="Day" size="2" maxlength="2"
                           value="{{\Carbon\Carbon::now('GMT')->get('day')}}">
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <select name=timezone>
        <option value="gmt" selected>GMT</option>
        <option value="local">Local</option>
    </select>
    <button type="submit">Convert</button>

    @if ($errors->hasAny(['format', 'year', 'month', 'Day', 'timezone']))
        <ul>
            <li>{{ $errors->first() }}</li>
        </ul>
    @endif

    @if(isset($format))
        @if ($format == 'year'))
        <table border="1px solid black">
            <tbody>
            <tr>
                <td></td>
                <td>Epoch</td>
                <td>Date and Time</td>
            </tr>
            <tr>
                <td>Start of Year</td>
                <td>{{$startTimestamp}}</td>
                <td>{{ $startDate }}</td>
            </tr>
            <tr>
                <td>End of Year</td>
                <td>{{$endTimestamp}}</td>
                <td>{{ $endDate }}</td>
            </tr>
            </tbody>
        </table>
        @elseif ($format == 'month')
            <table border="1px solid black">
                <tbody>
                <tr>
                    <td></td>
                    <td>Epoch</td>
                    <td>Date and Time</td>
                </tr>
                <tr>
                    <td>Start of Month</td>
                    <td>{{$startTimestamp}}</td>
                    <td>{{ $startDate }}</td>
                </tr>
                <tr>
                    <td>End of Month</td>
                    <td>{{$endTimestamp}}</td>
                    <td>{{ $endDate }}</td>
                </tr>
                </tbody>
            </table>
        @elseif($format == 'day')
            <table border="1px solid black">
                <tbody>
                <tr>
                    <td></td>
                    <td>Epoch</td>
                    <td>Date and Time</td>
                </tr>
                <tr>
                    <td>Start of Day</td>
                    <td>{{$startTimestamp}}</td>
                    <td>{{ $startDate }}</td>
                </tr>
                <tr>
                    <td>End of Day</td>
                    <td>{{$endTimestamp}}</td>
                    <td>{{ $endDate }}</td>
                </tr>
                </tbody>
            </table>
        @endif
    @endif
</form>
<br>
<br>
</body>
</html>

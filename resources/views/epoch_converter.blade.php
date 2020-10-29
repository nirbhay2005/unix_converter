<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Epoch Converter</title>
</head>
<body>
<h1>Epoch Converter</h1>
<br>
<h3>Timestamp to Date Converter</h3>
<form name="timestampToDate" method="POST" action="/date">
    @csrf
    <input type="text" name="timestamp" value="@if(isset($timestamp)) {{$timestamp}} @endif">
    <button type="submit">Timestamp to Date</button>
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
<h3>Date to Timestamp Converter</h3>
<form name="dateToTimestamp" method="POST" action="/timestamp">
    @csrf
    <input type="datetime-local" step="1" name="date">
    <select name=tz>
        <option value="gmt" selected>GMT</option>
        <option value="local">Local</option>
    </select>
    <button type="submit">Date to Timestamp</button>

    @if ($errors->first('date'))
        <ul>
            <li>{{ $errors->first('date') }}</li>
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
<h3>Human Date to Timestamp Converter</h3>
<form name="humanToTimestamp" method="POST" action="/time-stamp">
    @csrf
    <input type="text" name="date" size="30" value="@if(isset($humanDate)) {{$humanDate}} @endif">
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
<form name="beginEnd" method="POST" action="/dates">
    @csrf
    <input type="radio" name="format" value="year">
    <label for="year">Year</label>
    <input type="radio" name="format" checked value="month">
    <label for="month">Month</label>
    <input type="radio" name="format" value="day">
    <label for="day">Day</label>
    <br>
    <input type="date" name="date" value="{{\Carbon\Carbon::now()->toDateString()}}">
    <select name=timezone>
        <option value="gmt" selected>GMT</option>
        <option value="local">Local</option>
    </select>
    <button type="submit">Convert</button>

    @if ($errors->hasAny(['date', 'timezone']))
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
            <table border="1px solid black style=">
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

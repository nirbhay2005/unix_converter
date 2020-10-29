<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Epoch Converter</title>
</head>
<body>
<h1>Epoch Converter</h1>
<body>
<label>The current Unix Epoch time is
    <output id="time"></output>
</label>
</body>

<h3>Timestamp to Date Converter</h3>
<form name="timestampToDate" method="POST" action="/date">
    @csrf
    <input type="text" name="timestamp" value="{{\Carbon\Carbon::now('GMT')->getTimestamp()}}">
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
    <input type="datetime-local" step="1" name="date" value="{{\Carbon\Carbon::now('GMT')->toDateTimeLocalString()}}">
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
</form>
<br>
<br>
<h3>Human Date to Timestamp Converter</h3>
<form name="humanToTimestamp" method="POST" action="/time-stamp">
    @csrf
    <input type="text" name="date" size="30" value="{{\Carbon\Carbon::now('GMT')->toCookieString()}}">
    <button type="submit">Human Date to Timestamp</button>
    @if (isset($message))
        <p> {{ $message }}</p>
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
</form>
<br>
<br>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    var timestamp = '<?=time();?>';

    function updateTime() {
        $('#time').html((timestamp));
        timestamp++;
    }

    $(function () {
        setInterval(updateTime, 1000);
    });
</script>

</body>
</html>

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
    <input type="text" name="timestamp" value="@if(isset($timestamp)) {{$timestamp}} @endif">
    <button type="submit">Timestamp to Human Date</button>
    <p>Supports Unix Timestamps in seconds and milliseconds.</p>
    @if ($errors->first('timestamp'))
        <ul>
                <li>{{ $errors->first('timestamp') }}</li>
        </ul>
    @endif

    @if (isset($date))
        <p>Assuming that this timestamp is in {{ $date['unit'] }}:</p>
        <p>GMT          : {{ $date['gmt'] }}</p>
        <p>Your Timezone: {{ $date['local'] }}</p>
        <p>Relative     : {{$date['relative']}}</p>
    @endif
</form>
<br>
<br>
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
                    <input type="text" name="year" size="4" maxlength="4">
                    <span>-</span>
                </td>
                <td>
                    <input type="text" name="month" size="2" maxlength="2">
                    <span>-</span>
                </td>
                <td>
                    <input type="text" name="day" size="2" maxlength="2">
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
                    <input type="text" name="hr" size="2" maxlength="2">
                    <span>:</span>
                </td>
                <td>
                    <input type="text" name="min" size="2" maxlength="2">
                    <span>:</span>
                </td>
                <td>
                    <input type="text" name="sec" size="2" maxlength="2">
                </td>
            </tr>
            </tbody>
        </table>
        <select name = timezone>
            <option value="gmt">GMT</option>
            <option value="local">Local</option>
        </select>
        <button type="submit">Human Date to Timestamp</button>
    </div>

    @if ($errors->any())
        <ul>
            <li>{{ $errors->first() }}</li>
        </ul>
    @endif

    @if (isset($stamp))
        <p>Epoch Timestamp  : {{ $stamp }}</p>
        <p>Timestamp in milliseconds: {{ $stamp*1000 }}</p>
        <p>Date and Time (GMT) : {{$gmt}}</p>
        <p>Date and Time (Your Timezone) : {{$local}}</p>
    @endif
</form>
<br>
<br>
<br>
<br>
<form method="POST" action="/time-stamp">
    @csrf
    <input type="text" name="date" value="@if(isset($humanDate)) {{$humanDate}} @endif">
    <button type="submit">Human Date to Timestamp</button>
    @if (isset($error))
        <p> {{ $error }}</p>
    @endif
    @if (isset($stamp1))
        <p>Epoch Timestamp  : {{ $stamp1 }}</p>
        <p>Timestamp in milliseconds: {{ $stamp1*1000 }}</p>
        <p>Date and Time (GMT) : {{$gmt1}}</p>
        <p>Date and Time (Your Timezone) : {{$local1}}</p>
    @endif
</form>
<br>
<br>
<br>
<br>
<h1>Epoch Dates for the start and end of year/month/day</h1>
<form method="POST" action="/dates">
    @csrf
    <input type="radio" name="date" value="year">
    <label for="year">Year</label>
    <input type="radio" name="date" value="month">
    <label for="month">Month</label>
    <input type="radio" name="date" value="day">
    <label for="day">Day</label>
    <br>
    <input type="text" name="year" size="4" maxlength="4">-
    <input type="text" name="month" size="2" maxlength="2">-
    <input type="text" name="day" size="2" maxlength="2">
    <select name = timezone>
        <option value="gmt">GMT</option>
        <option value="local">Local</option>
    </select>
    <button type="submit">Convert</button>
</form>
</body>
</html>

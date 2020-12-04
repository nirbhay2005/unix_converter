<template>
    <div>
        <form @change.prevent="setPrefs" id="preferencesForm" name="preferencesForm">
            <h2>Date output format</h2>
            <p>
                The locale setting is used to detect a date format (and 'your time zone'-dates will be displayed in your
                language).<br>
                Your default (autodetected) locale is <b><span id="defaultLocale"></span>.</b>
            </p>
            <table class="col-sm-12">
                <tbody>
                <tr class="row">
                    <td class="col-sm-6">
                        <b>
                            <label for="locale"> Locale (date format/language)</label>
                        </b>
                        <br>
                        This setting has no effect on your timezone.
                    </td>
                    <td class="col-sm-6">
                        <select id="locale" name="ec_locale">
                            <option value="0">Autodetect</option>
                            <option value="en">English (US, MDY-format, 12h clock)</option>
                            <option value="en-gb">English (UK, DMY-format, 24h clock)</option>
                        </select>
                    </td>
                </tr>
                <br>
                <tr class="row">
                    <td class="col-sm-6">
                        <b>Clock Format</b>
                    </td>
                    <td class="col-sm-6">
                        <label>
                            <input checked="checked" id="clockf" name="ec_clockf" type="radio" value="0">
                            Based on locale (<b>recommended</b>)
                        </label>
                        <br>
                        <label>
                            <input id="clockf" name="ec_clockf" type="radio" value="12">
                            Force 12-hour clock (AM/PM)
                        </label>
                        <br>
                        <label>
                            <input id="clockf" name="ec_clockf" type="radio" value="24">
                            Force 24-hour clock
                        </label>
                        <br>
                    </td>
                </tr>
                </tbody>
            </table>
            <h2>Date input format (human to timestamp)</h2>
            <p>
                Used in the converters on the homepage.
            </p>
            <table class="col-sm-12">
                <tbody>
                <tr class="row">
                    <td class="col-sm-6">
                        <b> Default time zone input:</b>
                    </td>
                    <td class="col-sm-6">
                        <label>
                            <input checked="checked" id="tzpref" name="ec_tzpref" type="radio" value="1">
                            GMT/UTC
                        </label>
                        <br>
                        <label>
                            <input id="tzpref" name="ec_tzpref" type="radio" value="2">
                            Local time
                        </label>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
        <p>
            <span id="prefsmsg"></span>
        </p>
        <p>
            Start Over? <a @click="prefsClear" href="#top"> Reset Your Preferences. </a>
        </p>
    </div>
</template>

<script>
    export default {
        name: "PreferenceForm",
        methods: {
            setPrefs: function f() {
                var st = this.storageAvailable();
                if (st) {
                    var locale = $('select[name=ec_locale]').val();
                    if (locale !== '0') {
                        localStorage.setItem('ec_locale', locale);
                    } else {
                        localStorage.removeItem('ec_locale');
                    }
                    var clockf = $('input[name=ec_clockf]:checked').val();
                    if (clockf !== '0') {
                        localStorage.setItem('ec_clockf', clockf);
                    } else {
                        localStorage.removeItem('ec_clockf');
                    }
                    var tzpref = $('input[name=ec_tzpref]:checked').val();
                    localStorage.setItem('ec_tzpref', tzpref);
                    $('#prefsmsg').html('<b>Preferences saved!</b>');
                    setTimeout(this.prefsMsgClear, 1000);
                } else {
                    $('#prefsmsg').html('<b>Sorry, local storage is disabled in your browser or you are using an older browser.</b>');
                }
                return false;
            },
            storageAvailable: function () {
                try {
                    var storage = window['localStorage'],
                        x = '__storage_test__';
                    storage.setItem(x, x);
                    storage.removeItem(x);
                    return true;
                } catch (e) {
                    return e instanceof DOMException && (
                            // everything except Firefox
                        e.code === 22 ||
                        // Firefox
                        e.code === 1014 ||
                        // test name field too, because code might not be present
                        // everything except Firefox
                        e.name === 'QuotaExceededError' ||
                        // Firefox
                        e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
                        // acknowledge QuotaExceededError only if there's something already stored
                        storage && storage.length !== 0;
                }
            },
            prefsClear: function () {
                localStorage.removeItem('ec_locale');
                localStorage.removeItem('ec_clockf');
                localStorage.removeItem('ec_tzpref');
                localStorage.removeItem('theme');
                location.href = '/preferences?clear'
            },
            prefsMsgClear: function () {
                $('#prefsmsg').html('&nbsp;');
            },
            load: function () {
                var default_clockf = '0';
                var st = this.storageAvailable();
                var locale = window.navigator.language || "en";
                locale = locale.toLowerCase();
                if (locale) {
                    var localestring = $('select#locale option[value="' + locale + '"]').html();
                    if (!localestring) {
                        localestring = $('select#locale option[value="' + locale.substring(0, 2) + '"]').html();
                    }
                    if (localestring) {
                        document.getElementById('defaultLocale').innerHTML = localestring
                    }
                }
                if (st) {
                    if (localStorage.getItem('ec_tzpref') === "2") {
                        $('input#tzpref').filter('[value="2"]').attr('checked', true);
                    } else {
                        $('input#tzpref').filter('[value="1"]').attr('checked', true);
                    }
                    if (localStorage.getItem('ec_locale')) {
                        $('select#locale').val(localStorage.getItem('ec_locale'));
                    }
                    if (localStorage.getItem('ec_clockf')) {
                        default_clockf = localStorage.getItem('ec_clockf');
                    }
                    $('input#clockf').filter('[value="' + default_clockf + '"]').attr('checked', true);
                } else {
                    $('#prefsmsg').html('<b>Sorry, local storage is disabled in your browser or you are using an older browser. This page will not work without local storage.</b>');
                }

            }
        },
        mounted() {
            this.load()
        }

    }
</script>

<style scoped>
    select {
        height: fit-content;
        width: fit-content;
    }
</style>

<template>
    <div>
        <form @submit.prevent="setPrefs" id="preferencesForm" name="preferencesForm">
            <h2>Date-time input format in converters</h2>
            <table class="col-sm-12">
                <tbody>
                <tr class="row">
                    <td class="col-sm-6 p-f">
                        <b>Clock Format</b>
                    </td>
                    <td class="col-sm-6 p-f">
                        <label>
                            <input checked="checked" class="p-f" id="clockf" name="ec_clockf" type="radio" value="0">
                            Default (<b>recommended</b>)
                        </label>
                        <br>
                        <label>
                            <input class="p-f" id="clockf" name="ec_clockf" type="radio" value="12">
                            12-hour (AM/PM)
                        </label>
                        <br>
                        <label>
                            <input class="p-f" id="clockf" name="ec_clockf" type="radio" value="24">
                            24-hour
                        </label>
                        <br>
                    </td>
                </tr>
                <br>
                <tr class="row">
                    <td class="col-sm-6 p-f">
                        <b> Default time zone input:</b>
                    </td>
                    <td class="col-sm-6 p-f">
                        <label>
                            <input checked="checked" class="p-f" id="tzpref" name="ec_tzpref" type="radio" value="1">
                            GMT/UTC
                        </label>
                        <br>
                        <label>
                            <input class="p-f" id="tzpref" name="ec_tzpref" type="radio" value="2">
                            Local time
                        </label>
                    </td>
                </tr>
                </tbody>
            </table>
            <input class="p-f" type="submit">
        </form>
        <p>
            <span id="prefsmsg"></span>
        </p>
        <p class="p-f">
            Start Over? <a @click="prefsClear" href="#bottom"> Reset Your Preferences. </a>
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
                location.href = '/preferences';
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
                localStorage.removeItem('ec_clockf');
                localStorage.removeItem('ec_tzpref');
                location.href = '/preferences';
            },
            prefsMsgClear: function () {
                $('#prefsmsg').html('&nbsp;');
            },
            load: function () {
                let default_clockf = '0';
                let st = this.storageAvailable();
                if (st) {
                    if (localStorage.getItem('ec_tzpref') === "2") {
                        $('input#tzpref').filter('[value="2"]').attr('checked', true);
                    } else {
                        $('input#tzpref').filter('[value="1"]').attr('checked', true);
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
    h2 {
        color: black;
        font-weight: bold;
        text-shadow: 2px 2px grey;
    }

    select {
        height: fit-content;
        width: fit-content;
    }

    @media screen and (max-width: 414px) {
        h2 {
            font-size: x-large;
        }

        .p-f {
            font-size: small;
        }

    }
</style>

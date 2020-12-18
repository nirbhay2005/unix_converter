<template>
    <div class="mt-1">
        <h2>Convert Date to Unix Timestamp</h2>
        <form @submit.prevent="dateToEpoch" class="d-e">
            <input :placeholder="defaultDate" class="shadow-sm d-e rounded-lg" id="date" step="1" type="datetime-local"
                   v-model="date">
            <select class="shadow-sm d-e rounded-lg" id="date-format" v-model="meridian">
                <option class="d-e" value="AM">AM</option>
                <option class="d-e" value="PM">PM</option>
            </select>
            <select class="shadow-sm d-e rounded-lg" id="timezone" v-model="timezone">
                <option class="d-e" value="gmt">GMT</option>
                <option class="d-e" value="local">Local Time</option>
            </select><br>
            <button class="btn-success d-e rounded-lg mt-2" id="submit" type="submit">Convert to Timestamp</button>
        </form>
        <div class="result-box mt-2" v-if="response">
            <p><b>Unix Timestamp</b> : {{info.timestamp}} </p>
            <p><b>Timestamp in milliseconds</b> : {{info.timestamp * 1000}} </p>
            <p><b>Date and time (GMT)</b>: {{info.gmt}}</p>
            <p><b>Date and time (Your Timezone)</b> : {{info.local}}</p>
        </div>
        <div class="error-box mt-2 " v-if="error">
            <p><b>Please select valid date/timezone.</b></p>
        </div>
    </div>
</template>

<script>
    import SetPreference from "../../mixins/SetPreference";

    export default {
        name: "DateToEpoch",
        data() {
            return {
                error: false,
                info: '',
                response: false,
                date: '',
                timezone: '',
                format: '',
                meridian: '',
                inputDate: ''
            }
        },
        mixins: [SetPreference]
        ,
        computed: {
            defaultDate() {
                if (this.format === 24) {
                    return new Date().toISOString().substr(0, 19);
                } else {
                    let time = new Date();
                    this.meridian = this.formatAMPM(time, this.timezone)[1];
                    return time.toISOString().substr(0, 11) + this.formatAMPM(time, this.timezone)[0];
                }
            },
            localDate() {
                if (this.format === 24) {
                    let dt1 = new Date().toLocaleString().substr(12, 8);
                    let dt2 = new Date().toISOString().substr(0, 11);
                    return dt2 + dt1;
                } else {
                    let time = new Date();
                    this.meridian = this.formatAMPM(time, this.timezone)[1];
                    return time.toISOString().substr(0, 11) + this.formatAMPM(time, this.timezone)[0];
                }
            },
        },
        methods: {
            dateToEpoch() {
                if (this.format === 12) {
                    this.inputDate = this.date.substr(0, 10) + ' ' + this.date.substr(11, 8) + ' ' + this.meridian;
                } else {
                    this.inputDate = this.date;
                }
                axios.post('api/timestamp', {date: this.inputDate, timezone: this.timezone})
                    .then((response) => {
                        this.info = response.data.data
                        this.response = true
                        this.error = false
                    })
                    .catch(error => {
                        console.log(error.response.data);
                        this.error = true
                    });
                this.response = false;
            },
            load: function () {
                if (localStorage.getItem('ec_tzpref') == null) {
                    this.timezone = "gmt";
                    this.date = this.defaultDate;
                } else {
                    if (localStorage.getItem('ec_tzpref') == 2) {
                        this.timezone = "local";
                        this.date = this.localDate;
                    } else {
                        this.timezone = "gmt";
                        this.date = this.defaultDate;
                    }
                }
            },
            checkInput: function () {
                if (localStorage.getItem('ec_clockf') == null) {
                    this.format = 24;
                    $('#date-format').hide();
                } else {
                    if (localStorage.getItem('ec_clockf') == 12) {
                        this.format = 12;
                        $('#date-format').show();
                    } else {
                        this.format = 24;
                        $('#date-format').hide();
                    }
                }
            },
        },
        mounted() {
            this.checkInput()
            this.load()
        }
    };
</script>

<style scoped>
    #date {
        height: 40px;
        width: 250px;
    }

    #date-format {
        height: 40px;
        width: fit-content;
    }

    #timezone {
        height: 40px;
    }

    #submit {
        width: 250px;
        height: 40px;
    }

    div.result-box {
        line-height: normal;
    }

    div.error-box {
        line-height: normal;
    }

    h2 {
        color: #1b4b72;
        font-weight: bold;
    }

    @media screen and (max-width: 414px) {
        #date {
            width: 185px;
            height: 30px;
        }

        #date-format {
            height: 30px;
        }

        #timezone {
            margin-top: 10px;
            height: 30px;
        }

        #submit {
            width: 185px;
            height: 30px;
        }

        .result-box {
            font-size: x-small;
        }

        .error-box {
            font-size: x-small;
        }

        h2 {
            font-size: x-large;
        }

        .d-e {
            font-size: small;
        }

        div.d-e {
            line-height: 12px;
        }
    }
</style>

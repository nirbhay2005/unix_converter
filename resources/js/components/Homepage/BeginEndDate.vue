<template>
    <div class="mt-1">
        <h2>Get timestamp for the start and end of the year/month/day</h2>
        <form @submit.prevent="beginEnd">
            <p>Show start and end of <span> </span>
                <input id="year" type="radio" v-model="format" value="year">
                <label for="year">Year</label>
                <input id="month" name="format" type="radio" v-model="format" value="month">
                <label for="month">Month</label>
                <input id="day" name="format" type="radio" v-model="format" value="day">
                <label for="day">Day</label>
                <br>
                <input :placeholder="defaultDate" class="shadow-sm rounded-lg" id="date" type="date" v-model="date">
                <select class="shadow-sm b-e rounded-lg" id="timezone" v-model="timezone">
                    <option class="b-e" selected value="gmt">GMT</option>
                    <option class="b-e" value="local">Local Time</option>
                </select><br>
                <button class="btn-dark rounded-lg mt-2" id="submit" type="submit">Convert to Timestamp</button>
            </p>
        </form>
        <div class="result-box mt-2" v-if="response">
            <table border="1px solid black" v-if="format=='day'">
                <tbody>
                <tr class="bg-dark">
                    <td></td>
                    <td class="text-white">Timestamp</td>
                    <td class="text-white">Date and Time</td>
                </tr>
                <tr>
                    <td>Start of day:</td>
                    <td>{{info.day.startTimestamp}}</td>
                    <td>{{ info.day.startDate }}</td>
                </tr>
                <tr>
                    <td>End of day:</td>
                    <td>{{info.day.endTimestamp}}</td>
                    <td>{{ info.day.endDate }}</td>
                </tr>
                </tbody>
            </table>
            <table border="1px solid black" v-else-if="format=='month'">
                <tbody>
                <tr class="bg-dark">
                    <td></td>
                    <td class="text-white">Timestamp</td>
                    <td class="text-white">Date and Time</td>
                </tr>
                <tr>
                    <td>Start of month:</td>
                    <td>{{info.month.startTimestamp}}</td>
                    <td>{{ info.month.startDate }}</td>
                </tr>
                <tr>
                    <td>End of month:</td>
                    <td>{{info.month.endTimestamp}}</td>
                    <td>{{ info.month.endDate }}</td>
                </tr>
                </tbody>
            </table>
            <table border="1px solid black" v-else-if="format=='year'">
                <tbody>
                <tr class="bg-dark">
                    <td></td>
                    <td class="text-white">Timestamp</td>
                    <td class="text-white">Date and Time</td>
                </tr>
                <tr>
                    <td>Start of year:</td>
                    <td>{{info.year.startTimestamp}}</td>
                    <td>{{ info.year.startDate }}</td>
                </tr>
                <tr>
                    <td>End of year:</td>
                    <td>{{info.year.endTimestamp}}</td>
                    <td>{{ info.year.endDate }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="error-box mt-3" v-if="error">
            <p><b>Please select the year/month/date or timezone.</b></p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BeginEndDate",
        data() {
            return {
                error: false,
                info: '',
                response: false,
                date: '',
                timezone: '',
                format: 'month'
            }
        },
        computed: {
            defaultDate() {
                let dt = new Date();
                let dd = dt.getDate();
                let mm = dt.getMonth() + 1;
                let yyyy = dt.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }

                if (mm < 10) {
                    mm = '0' + mm;
                }
                return this.date = yyyy + '-' + mm + '-' + dd;
            }
        },
        methods: {
            beginEnd() {
                axios.post('api/begin-end', {format: this.format, date: this.date, timezone: this.timezone})
                    .then((response) => {
                        this.info = response.data.data
                        this.response = true
                        this.error = false
                    })
                    .catch(error => {
                        console.log(error.response.status);
                        this.error = true
                    });
                this.response = false;
            },
            load: function () {
                if (localStorage.getItem('ec_tzpref') == null) {
                    this.timezone = "gmt";
                } else {
                    if (localStorage.getItem('ec_tzpref') == 2) {
                        this.timezone = "local";
                    } else {
                        this.timezone = "gmt";
                    }
                }
            },
        },
        created() {
            this.load()
        }
    }
</script>

<style scoped>
    #date {
        height: 40px;
        width: 145px;
    }

    #timezone {
        height: 40px;
    }

    #submit {
        width: 250px;
        height: 40px;
    }

    h2 {
        color: black;
        font-weight: bold;
        text-shadow: 2px 2px grey;
    }

    @media screen and (max-width: 414px) {
        #date {
            width: 115px;
            height: 30px;
        }

        #timezone {
            margin-top: 10px;
            height: 30px;
            width: 65px;
        }

        #submit {
            width: 185px;
            height: 30px;
        }

        .result-box {
            font-size: x-small;
        }

        p {
            font-size: 12px;
        }

        label {
            font-size: 12px;
        }

        h2 {
            font-size: x-large;
        }

        .b-e {
            font-size: small;
        }

        div.b-e {
            line-height: 12px;
        }
    }
</style>

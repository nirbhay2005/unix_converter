<template>
    <div>
        <h3>Epoch dates for the start and end of the year/month/day</h3>
        <form @submit.prevent="beginEnd">
            <p>Show start and end of <span> </span>
                <input id="year" type="radio" v-model="format" value="year">
                <label for="year">Year</label>
                <input id="month" name="format" type="radio" v-model="format" value="month">
                <label for="month">Month</label>
                <input id="day" name="format" type="radio" v-model="format" value="day">
                <label for="day">Day</label>
                <br>
                <input :placeholder="defaultDate" class="shadow-sm" type="date" v-model="date">
                <select class="shadow-sm" v-model="timezone">
                    <option selected value="gmt">GMT</option>
                    <option value="local">Local Time</option>
                </select>
                <button class="btn-group btn-info" type="submit">Convert</button>
            </p>
        </form>
        <div class="result-box mt-2" v-if="response">
            <table border="1px solid black" v-if="format=='day'">
                <tbody>
                <tr class="bg-info">
                    <td></td>
                    <td>Epoch</td>
                    <td>Date and Time</td>
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
                <tr class="bg-info">
                    <td></td>
                    <td>Epoch</td>
                    <td>Date and Time</td>
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
                <tr class="bg-info">
                    <td></td>
                    <td>Epoch</td>
                    <td>Date and Time</td>
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
                timezone: 'gmt',
                format: 'month'
            }
        },
        computed: {
            defaultDate() {
                let dt = new Date();
                return this.date = dt.getFullYear() + '-' + (dt.getUTCMonth() + 1) + '-' + dt.getDate();
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
        }
    }
</script>

<style scoped>
    select {
        height: 30px;
        width: 100px;
    }

    h3 {
        color: #1b4b72;
    }
</style>

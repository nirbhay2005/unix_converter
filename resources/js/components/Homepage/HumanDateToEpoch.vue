<template>
    <div class="mt-5">
        <h3>Convert human readable date to epoch timestamp</h3>
        <form @submit.prevent="humanDateToEpoch" class="h-e">
            <input :placeholder="defaultDate" class="shadow-sm h-e" size="35" type="text" v-model="date">
            <button class="btn-group btn-info h-e" type="submit">Human Date to Timestamp</button>
            <button class="btn-group btn-info e-h" type="reset">Reset</button>
            <p class="font-weight-lighter mt-1 h-e">Input format: Relative date(e.g. today, tomorrow etc),
                RFC 2822, D-M-Y, M/D/Y, Y-M-D, etc. Strip 'GMT' to convert to local time.</p>
        </form>
        <div class="result-box mt-2 h-e" v-if="info.status">
            <p><b>Epoch Timestamp</b> : {{info.timestamp}} </p>
            <p><b>Timestamp in milliseconds</b> : {{info.timestamp * 1000}} </p>
            <p><b>Date and time (GMT)</b>: {{info.gmt}}</p>
            <p><b>Date and time (Your Timezone)</b> : {{info.local}}</p>
        </div>
        <div v-else>
            <p><b>{{info.timestamp}}</b></p>
        </div>
    </div>
</template>

<script>
    import SetPreference from "../../mixins/SetPreference";

    export default {
        name: "HumanDateToEpoch",
        data() {
            return {
                error: false,
                info: '',
                response: false,
                date: '',
                format: ''
            }
        },
        mixins: [SetPreference],

        computed: {
            defaultDate() {
                if (this.format === 24) {
                    return new Date().toUTCString();
                } else {
                    let time = new Date();
                    return time.toDateString() + ' ' + this.formatAMPM(time, 'gmt')[0] + ' ' + this.formatAMPM(time, this.timezone)[1] + ' GMT';
                }
            },
            localDate() {
                if (this.format === 24) {
                    return new Date().toString().substr(0, 24);
                } else {
                    let time = new Date();
                    return time.toDateString() + ' ' + this.formatAMPM(time, 'local')[0] + ' ' + this.formatAMPM(time, this.timezone)[1];
                }
            }
        },
        methods: {
            humanDateToEpoch() {
                axios.post('api/timestamp-human', {date: this.date})
                    .then((response) => {
                        this.info = response.data.data
                        this.response = true
                        this.error = false
                    })
                    .catch(error => {
                        console.log(error.response.data);
                        console.log(error.response.status);
                        this.error = true
                    });
                this.response = false;
            },
            load: function () {
                if (localStorage.getItem('ec_tzpref') == null) {
                    this.date = this.defaultDate;
                } else {
                    if (localStorage.getItem('ec_tzpref') == 2) {
                        this.date = this.localDate;
                    } else {
                        this.date = this.defaultDate;
                    }
                }
            },
            checkInput: function () {
                if (localStorage.getItem('ec_clockf') == null) {
                    this.format = 24;
                } else {
                    if (localStorage.getItem('ec_clockf') == 12) {
                        this.format = 12;
                    } else {
                        this.format = 24;
                    }
                }
            },
        },
        mounted() {
            this.checkInput()
            this.load()
        }
    }
</script>

<style scoped>
    div.result-box {
        line-height: normal;
    }

    h3 {
        color: #1b4b72;
    }

    @media screen and (max-width: 576px) {
        h3 {
            font-size: x-large;
        }

        .h-e {
            font-size: small;
        }

        div.h-e {
            line-height: 12px;
        }
    }
</style>

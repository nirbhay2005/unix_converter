<template>
    <div class="mt-5">
        <h2>Convert human readable date to Unix Timestamp</h2>
        <form @submit.prevent="humanDateToEpoch" class="h-e">
            <input :placeholder="defaultDate" class="shadow-sm h-e rounded-lg" required size="35" type="text"
                   v-model="date">
            <button class="btn-dark h-e rounded-lg" type="submit">Date to Timestamp</button>
            <button class="btn-dark e-h rounded-lg" type="reset">Reset</button>
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
                    return time.toDateString() + ' ' + this.formatAMPM(time, 'gmt')[0] + ' ' + this.formatAMPM(time, 'gmt')[1] + ' GMT';
                }
            },
            localDate() {
                if (this.format === 24) {
                    return new Date().toString().substr(0, 24);
                } else {
                    let time = new Date();
                    return time.toDateString() + ' ' + this.formatAMPM(time, 'local')[0] + ' ' + this.formatAMPM(time, 'local')[1];
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

    h2 {
        color: black;
        font-weight: bold;
        text-shadow: 2px 2px grey;
    }

    @media screen and (max-width: 576px) {
        h2 {
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

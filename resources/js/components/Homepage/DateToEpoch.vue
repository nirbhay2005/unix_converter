<template>
    <div class="mt-5">
        <h3>Convert Date to epoch timestamp</h3>
        <form @submit.prevent="dateToEpoch" class="d-e">
            <input :placeholder="defaultDate" class="shadow-sm d-e" step="1" type="datetime-local" v-model="date">
            <select class="shadow-sm d-e" v-model="timezone">
                <option class="d-e" selected value="gmt">GMT</option>
                <option class="d-e" value="local">Local Time</option>
            </select>
            <button class="btn-group btn-info d-e" type="submit">Date to Timestamp</button>
        </form>
        <div class="result-box mt-2 d-e" v-if="response">
            <p><b>Epoch Timestamp</b> : {{info.timestamp}} </p>
            <p><b>Timestamp in milliseconds</b> : {{info.timestamp * 1000}} </p>
            <p><b>Date and time (GMT)</b>: {{info.gmt}}</p>
            <p><b>Date and time (Your Timezone)</b> : {{info.local}}</p>
        </div>
        <div class="error-box mt-3 d-e" v-if="error">
            <p><b>Please select the timezone.</b></p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DateToEpoch",
        data() {
            return {
                error: false,
                info: '',
                response: false,
                date: '',
                timezone: 'gmt'
            }
        },
        computed: {
            defaultDate() {
                return this.date = new Date().toISOString().substr(0, 19);
            }
        },
        methods: {
            dateToEpoch() {
                axios.post('api/timestamp', {date: this.date, timezone: this.timezone})
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
    };
</script>

<style scoped>
    select {
        height: 30px;
        width: 100px;
    }

    div.result-box {
        line-height: normal;
    }

    div.error-box {
        line-height: normal;
    }

    h3 {
        color: #1b4b72;
    }

    @media screen and (max-width: 576px) {
        h3 {
            font-size: x-large;
        }

        .d-e {
            font-size: small;
        }

        div.d-e {
            line-height: 12px;
        }

        select {
            height: 25px;
        }
    }
</style>

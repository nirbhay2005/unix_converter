<template>
    <div class="mt-5">
        <form @submit.prevent="dateToEpoch">
            <input :placeholder="defaultDate" step="1" type="datetime-local" v-model="date">
            <select v-model="timezone">
                <option selected value="gmt">GMT</option>
                <option value="local">Local Time</option>
            </select>
            <button type="submit">Date to Timestamp</button>
        </form>
        <div class="result-box mt-2" v-if="response">
            <p><b>Epoch Timestamp</b> : {{info.timestamp}} </p>
            <p><b>Timestamp in milliseconds</b> : {{info.timestamp * 1000}} </p>
            <p><b>Date and time (GMT)</b>: {{info.gmt}}</p>
            <p><b>Date and time (Your Timezone)</b> : {{info.local}}</p>
        </div>
        <div class="error-box mt-3" v-if="error">
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
                timezone: ''
            }
        },
        computed: {
            defaultDate() {
                return this.date = new Date().toISOString().substr(0, 19);
            },
            test() {
                return "hello";
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
        line-height: 10px;
    }

    div.error-box {
        line-height: 5px;
    }
</style>

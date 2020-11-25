<template>
    <div class="mt-5">
        <form @submit.prevent="humanDateToEpoch">
            <input :placeholder="defaultDate" size="30" type="text" v-model="date">
            <button type="submit">Human Date to Timestamp</button>
            <p class="font-weight-lighter mt-1">Input format: RFC 2822, D-M-Y, M/D/Y, Y-M-D, etc. Strip 'GMT' to convert
                to local time.</p>
        </form>
        <div class="result-box mt-2" v-if="info.status">
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
    export default {
        name: "HumanDateToEpoch",
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
                return this.date = new Date().toUTCString();
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
        }
    }
</script>

<style scoped>
    div.result-box {
        line-height: 10px;
    }
</style>

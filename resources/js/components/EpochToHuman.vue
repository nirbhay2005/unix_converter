<template>
    <div class="mt-5">
        <h3>Convert epoch timestamp to human-readable date</h3>
        <form @submit.prevent="epochToHuman" class="mt-3">
            <input :placeholder="stamp" class="shadow-sm" v-model="timestamp">
            <button class="btn-group btn-info" type="submit">Timestamp to Date</button>
            <p>Supports Unix timestamps in seconds and milliseconds.</p>
        </form>
        <div class="result-box" v-if="response">
            <p>Assuming that this timestamp is in <b>{{info.unit}}</b>:</p>
            <p><b>GMT</b> : {{info.gmt}} </p>
            <p><b>Your Timezone</b>: {{info.local}}</p>
            <p><b>Relative</b> : {{info.relative}}</p>
        </div>
        <div class="error-box" v-if="error">
            <p>Sorry, this timestamp is not valid.</p>
            <p>Check your timestamp, strip letters and punctuation marks.</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EpochToHuman",
        data() {
            return {
                error: false,
                info: '',
                timestamp: '',
                response: false,
            }
        },
        computed: {
            stamp() {
                return this.timestamp = Math.floor(Date.now() / 1000)
            }
        },
        methods: {
            epochToHuman() {
                axios.post('api/date', {timestamp: this.timestamp})
                    .then((response) => {
                        this.info = response.data.data
                        this.response = true
                        this.error = false
                    })
                    .catch(error => {
                        this.error = true
                    });
                this.response = false;
            },
            showDate() {
                this.display = "block";
            }
        }
    }
</script>

<style scoped>
    div.result-box {
        line-height: normal;
        overflow: auto;

    }

    div.error-box {
        line-height: normal;
    }

    h3 {
        color: #1b4b72;
    }
</style>

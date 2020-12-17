<template>
    <div class="e-h">
        <h2>Convert Unix Timestamp to Date</h2>
        <form @submit.prevent="epochToHuman" class="mt-3 e-h">
            <input :placeholder="stamp" class="shadow-sm e-h rounded-lg" id="input" required size="12"
                   v-model="timestamp">
            <button class="btn-dark rounded-lg" id="reset" type="reset">Reset</button>
            <br>
            <button class="btn-dark rounded-lg mt-2" id="submit" type="submit">Convert to Date</button>
        </form>
        <div class="result-box mt-2" v-if="response">
            <p>Assuming that this timestamp is in <b>{{info.unit}}</b>:</p>
            <p><b>Date and Time (GMT)</b> : {{info.gmt}} </p>
            <p><b>Date and Time (Your Timezone)</b>: {{info.local}}</p>
            <p><b>Relative</b> : {{info.relative}}</p>
        </div>
        <div class="error-box mt-2" v-if="error">
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
        }
    }
</script>

<style scoped>
    #input {
        height: 40px;
    }

    #reset {
        height: 40px;
    }

    #submit {
        height: 40px;
        width: 200px;
    }

    div.result-box {
        line-height: normal;
        overflow: auto;
    }

    div.error-box {
        line-height: normal;
    }

    h2 {
        color: black;
        font-weight: bold;
        text-shadow: 2px 2px grey;
    }

    @media screen and (max-width: 414px) {
        #input {
            height: 30px;
        }

        #reset {
            height: 30px;
        }

        #submit {
            width: 175px;
            height: 30px;
        }

        h2 {
            font-size: x-large;
        }

        .result-box {
            font-size: x-small;
        }

        .result-box {
            font-size: x-small;
            line-height: 0px;
        }

        .e-h {
            margin-top: 10px;
            font-size: small;
        }

        div.e-h {
            line-height: initial;
        }
    }
</style>

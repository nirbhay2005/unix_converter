<template>
    <div class="mt-3 ml-4 mr-4 mb-2 border rounded shadow-sm">
        <p class="mt-3 ml-2 mr-1 mb-2">Current Unix Timestamp:
            <span class="font-weight-bold" style="text-shadow: 1px 1px grey"><label
                id="time">{{timestamp}}</label></span>
        </p>
    </div>
</template>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    export default {
        name: "HeaderClock",
        computed: {
            timestamp() {
                return Math.floor(Date.now() / 1000);
            }
        },
        beforeCreate() {
            function updateTime() {
                let timestamp = Math.floor(Date.now() / 1000);
                $('#time').html((timestamp));
                timestamp++;
            }

            $(function () {
                setInterval(updateTime, 1000);
            });
        }
    }
</script>

<style scoped>
    p {
        text-align: center;
        font-size: large;
    }

    @media only screen and (min-width: 415px) {
        p {
            text-align: left;
            font-size: large;
        }

    }
</style>

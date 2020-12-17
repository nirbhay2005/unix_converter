<template>
    <div class="mt-3 ml-4 mr-4 border rounded border-dark shadow">
        <p class="mt-3 ml-2 mr-1">Current Unix Timestamp:
            <span class="font-weight-bold" style="text-shadow: 1px 1px grey"><label id="time"></label></span>
        </p>
    </div>
</template>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    export default {
        name: "HeaderClock",
        beforeCreate() {
            let timestamp = Math.floor(Date.now() / 1000);

            function updateTime() {
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

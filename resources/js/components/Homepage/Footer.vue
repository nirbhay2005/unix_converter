<template>
    <div>
        <div class="mt-3 ml-3 mr-3 rounded border-dark border bg-transparent shadow">
            <h4><b>What is Unix Timestamp?</b></h4>
            <p>Unix timestamp is a system for describing a point in time. It is the number of seconds that have elapsed
                since the Unix epoch,
                the Unix epoch is <b>00:00:00 UTC on 1 January 1970</b> (an arbitrary date). A Unix timestamp is
                interpreted the same regardless of
                region and is calculated from the same point in time regardless of the time zone. If you have a web
                application that is used
                over multiple timezones and you need date/time to reflect individual users' settings, use a unix
                timestamp.
            </p>
        </div>
        <br>
        <div class="card-footer border-dark ml-3 mr-3">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Footer"
    }
</script>

<style scoped>
    div {
        padding: 12px;
    }

    p {
        font-size: 15px;
    }

    @media screen and (max-width: 414px) {
        p {
            font-size: 10px;
        }

        h4 {
            font-size: large;
        }
    }
</style>

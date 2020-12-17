<template>
    <div>
        <div class="mt-3 ml-3 mr-3 rounded border bg-transparent shadow">
            <h4><b>What is Unix Timestamp?</b></h4>
            <p>Unix timestamp is a system for describing a point in time. It is the number of seconds that have elapsed
                since the Unix epoch,
                the Unix epoch is <b>00:00:00 UTC on 1 January 1970</b> (an arbitrary date). A Unix timestamp is
                interpreted the same regardless of
                region and is calculated from the same point in time regardless of the time zone. If you have a web
                application that is used
                over multiple timezones and you need date/time to reflect individual users' settings, use a unix
                timestamp.
            </p><br>
            <h4><b>What is the limit of Unix Timestamp?</b></h4>
            <p>Unix Time is represented by a 32 bit whole number (an integer) that can be positive or negative (signed).
                Unix was originally developed in the 60s and 70s so the "start" of Unix Time was set to January 1st 1970
                at midnight GMT (Greenwich Mean Time) - this date/time was assigned the Unix Time value of 0.
                This is what is known as the Unix Epoch.</p>
            <p>
                A 32 bit signed integer can represent whole numbers between -2147483648 and 2147483647. Since Unix Time
                starts at 0, negative Unix Time values go back in time from the Epoch and positive numbers go forward in
                time. This means that Unix Time spans from Unix Time value of -2147483648 or 20:45:52 GMT on December
                13th
                1901 to Unix Time value of 2147483647 or 3:14:07 GMT on January 19 in 2038. These dates represent the
                beginning,
                the pre-history and the end of Unix Time.
            </p>
            <p>
                The end of Unix Time will occur on January 19, 2038 03:14:07 GMT. On January 19, 2038 03:14:08 GMT all
                computers that still use 32 bit Unix Time will overflow. This is known as the "Year 2038 problem". Some
                believe this will be a more significant problem than the "Year 2000 problem". The fix for the Year 2038
                problem is to store Unix Time in a 64 bit integer. This is already underway in most 64 bit Operating
                Systems
                but many systems may not be updated by 2038.
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

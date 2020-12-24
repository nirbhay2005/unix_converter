<template>
    <div class="mt-4 ml-4 mr-4 row">
        <div class="border sidebar mr-4 rounded shadow col-sm-3">
            <div class="shadow-sm rounded">
                <a class="active t1" href="/"> Date to Timestamp Converter</a>
            </div>
            <div class="shadow-sm rounded">
                <a class="t2">Timestamp to Date Converter</a>
            </div>
            <div class="shadow-sm rounded">
                <a class="t3">Timestamp for Interval</a>
            </div>
            <div class="shadow-sm rounded">
                <a class="t4">Timezone Converter</a>
            </div>
            <div class="shadow-sm rounded">
                <a class="t5" href="/preferences">Preferences</a>
            </div>
        </div>

        <div class="col-sm-8 content ml-1 mr-1">
            <date-to-epoch class="r1"></date-to-epoch>
            <human-date-to-epoch class="r1"></human-date-to-epoch>
            <epoch-to-human class="r2"></epoch-to-human>
            <begin-end class="r3"></begin-end>
            <tz-converter class="r4"></tz-converter>
            <pref-form class="r5"></pref-form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MainBody",
        methods: {
            showContent() {
                $(".t1").click(function () {
                    $(".r1").show();
                    $(".r2").hide();
                    $(".r3").hide();
                    $(".r4").hide();
                    $(".r5").hide();
                    $(".t1").addClass("active");
                    $(".t2").removeClass("active");
                    $(".t3").removeClass("active");
                    $(".t4").removeClass("active");
                    $(".t5").removeClass("active");
                });
                $(".t2").click(function () {
                    $(".r1").hide();
                    $(".r2").fadeIn(1000);
                    $(".r3").hide();
                    $(".r4").hide();
                    $(".r5").hide();
                    $(".t1").removeClass("active");
                    $(".t2").addClass("active");
                    $(".t3").removeClass("active");
                    $(".t4").removeClass("active");
                    $(".t5").removeClass("active");
                });
                $(".t3").click(function () {
                    $(".r1").hide();
                    $(".r2").hide();
                    $(".r3").fadeIn(1000);
                    $(".r4").hide();
                    $(".r5").hide();
                    $(".t1").removeClass("active");
                    $(".t2").removeClass("active");
                    $(".t3").addClass("active");
                    $(".t4").removeClass("active");
                    $(".t5").removeClass("active");
                });
                $(".t4").click(function () {
                    $(".r1").hide();
                    $(".r2").hide();
                    $(".r3").hide();
                    $(".r4").fadeIn(1000);
                    $(".r5").hide();
                    $(".t1").removeClass("active");
                    $(".t2").removeClass("active");
                    $(".t3").removeClass("active");
                    $(".t4").addClass("active");
                    $(".t5").removeClass("active");
                });
                $(".t5").click(function () {
                    $(".r1").hide();
                    $(".r2").hide();
                    $(".r3").hide();
                    $(".r4").hide();
                    $(".r5").show();
                    $(".t1").removeClass("active");
                    $(".t2").removeClass("active");
                    $(".t3").removeClass("active");
                    $(".t4").removeClass("active");
                    $(".t5").addClass("active");
                });
            }
        },
        mounted() {
            this.showContent()
        }
    }
</script>

<style scoped>
    body {
        margin: 0;
        font-family: "Lato", sans-serif;
    }

    .r2 {
        display: none;
    }

    .r3 {
        display: none;
    }

    .r4 {
        display: none;
    }

    .r5 {
        display: none;
    }

    .sidebar {
        margin: 0;
        padding: 0;
        width: fit-content;
        background-color: #f1f1f1;
        height: fit-content;
        overflow: auto;
    }

    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
    }

    .sidebar a.active {
        background-color: black;
        color: white;
    }

    .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

    div.content {
        padding: 1px 16px;
    }

    @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .sidebar a {
            float: left;
        }

        div.content {
            margin-left: 0;
        }
    }

    @media screen and (max-width: 414px) {
        .sidebar {
            margin-left: 25px;
            margin-bottom: 10px;
        }

        .sidebar a {
            text-align: center;
            float: none;
        }
    }
</style>

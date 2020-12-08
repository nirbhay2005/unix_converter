<template>
    <div class="mt-5 container row">
        <div class="border sidebar rounded shadow col-sm-4">
            <div class="shadow-sm rounded">
                <a class="active t1" href="/"> Timestamp to Date Converter</a>
            </div>
            <div class="shadow-sm rounded">
                <a class="t2">Date to Timestamp Converter</a>
            </div>
            <div class="shadow-sm rounded">
                <a class="t3">Timestamp for Interval</a>
            </div>
            <div class="shadow-sm rounded">
                <a class="t4" href="/preferences">Preferences</a>
            </div>
        </div>

        <div class="col-sm-8 content mt-3">
            <epoch-to-human class="r1"></epoch-to-human>
            <date-to-epoch class="r2"></date-to-epoch>
            <human-date-to-epoch class="r2"></human-date-to-epoch>
            <begin-end class="r3"></begin-end>
            <pref-form class="r4"></pref-form>
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
                    $(".t1").addClass("active");
                    $(".t2").removeClass("active");
                    $(".t3").removeClass("active");
                    $(".t4").removeClass("active");

                });
                $(".t2").click(function () {
                    $(".r1").hide();
                    $(".r2").show();
                    $(".r3").hide();
                    $(".r4").hide();
                    $(".t1").removeClass("active");
                    $(".t2").addClass("active");
                    $(".t3").removeClass("active");
                    $(".t4").removeClass("active");
                });
                $(".t3").click(function () {
                    $(".r1").hide();
                    $(".r2").hide();
                    $(".r3").show();
                    $(".r4").hide();
                    $(".t1").removeClass("active");
                    $(".t2").removeClass("active");
                    $(".t3").addClass("active");
                    $(".t4").removeClass("active");
                });
                $(".t4").click(function () {
                    $(".r1").hide();
                    $(".r2").hide();
                    $(".r3").hide();
                    $(".r4").show();
                    $(".t1").removeClass("active");
                    $(".t2").removeClass("active");
                    $(".t3").removeClass("active");
                    $(".t4").addClass("active");
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

    .sidebar {
        margin: 0;
        padding: 0;
        background-color: #f1f1f1;
        width: 5px;
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
        .sidebar a {
            text-align: center;
            float: none;
        }
    }
</style>

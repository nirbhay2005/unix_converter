<template>
    <div class="bg rounded-bottom fixed-top">
        <div class="heading"><a href="/"><b>Unix</b> <i>Converter</i></a></div>
    </div>
</template>

<script>
    export default {
        name: "Header"
    }
</script>

<style scoped>
    div.bg {
        position: relative;
        max-width: 100%;
        height: 80px;
        background-image: url('/img/clock-small.jpg');
        background-size: 100% 100%;
    }

    .heading {
        position: absolute;
        top: 30px;
        left: 20px;
        color: white;
        margin: 0 auto;
    }

    a {
        color: white;
        font-size: x-large;
        text-decoration: none;
    }

    @media only screen and (min-width: 415px) {
        div.bg {
            background-image: url('/img/clock.jpg');
            height: 120px;
        }

        a {
            color: white;
            font-size: xx-large;
        }
    }
</style>

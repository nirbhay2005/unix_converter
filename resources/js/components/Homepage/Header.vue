<template>
    <div class="bg ml-4 mr-4 rounded-bottom">
        <div class="heading"><a href="/"><b>UNIX</b> <i>Converter</i></a></div>
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
        background-image: linear-gradient(#1b4b72, royalblue);
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
            height: 150px;
            background-image: linear-gradient(#1b4b72, royalblue);
        }

        a {
            color: white;
            font-size: 50px;
        }
    }
</style>

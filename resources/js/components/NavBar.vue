<template>
    <nav class="navbar navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="/"><h3><b> <img :src="img_src" alt="logo"> Epoch</b> <i>Converter</i></h3></a>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "NavBar",
        data() {
            return {
                img_src: '/img/logo.jpeg',
            }
        }
    }
</script>
<style scoped>
    img {
        display: inline;
        height: 50px;
        width: 50px;
    }

    h1 {
        word-wrap: break-word;
    }

</style>

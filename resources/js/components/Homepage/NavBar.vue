<template>
    <nav class="navbar navbar-dark bg-info">
        <a class="navbar-brand" href="/"><h3><b> <img :src="img_src" alt="logo"> Epoch</b> <i>Converter</i></h3></a>
        <div>
            <div class="btn-group">
                <a data-toggle="dropdown" id="menulink" size="300px" style="color: white">☰</a>
                <div class="dropdown-menu dropdown-menu-right shadow-md" id="menu">
                    <div class="dropdown-item-text font-weight-bolder" style="font-family: 'Apple Color Emoji'"><h2
                        class="header">Pages</h2></div>
                    <a class="dropdown-item font-weight-bold" href="/">Home</a>
                    <a class="dropdown-item" href="/preferences">Preferences</a>
                    <div class="dropdown-header font-weight-bolder header" style="font-family: 'Apple Color Emoji'">
                        Tools
                    </div>
                    <a class="dropdown-item" href="#">Epoch Converter</a>
                    <a class="dropdown-item" href="#">Batch Converter</a>
                    <a class="dropdown-item" href="#">Timezone Converter</a>
                    <a class="dropdown-item" href="#">Timestamp List</a>
                    <div class="dropdown-header font-weight-bolder header" style="font-family: 'Apple Color Emoji'">Date
                        and Time
                    </div>
                    <a class="dropdown-item" href="#">Week Numbers</a>
                    <a class="dropdown-item" href="#">Weeks By Year</a>
                    <a class="dropdown-item" href="#">Day Numbers</a>
                    <a class="dropdown-item" href="#">Days By Year</a>
                    <a class="dropdown-item" href="#">Calculate the difference <br> between two dates</a>
                    <div class="dropdown-header font-weight-bolder header" style="font-family: 'Apple Color Emoji'">
                        Programming
                    </div>
                    <a class="dropdown-item" href="#">Routines By Language</a>
                    <a class="dropdown-item" href="#">Epoch in C</a>
                    <a class="dropdown-item" href="#">Epoch in MySQL</a>
                    <a class="dropdown-item" href="#">Epoch in PHP</a>
                    <div class="dropdown-header font-weight-bolder header" style="font-family: 'Apple Color Emoji'">
                        More
                    </div>
                    <a class="dropdown-item" href="#">Comments and Questions</a>
                </div>
            </div>
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
        },
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

    .header {
        color: #1b4b72;
    }

    @media screen and (max-width: 576px) {
        #menulink {
            display: block;
        }

        h3 {
            font-size: x-large;
        }

        .dropdown-item {
            font-size: small;
        }

        .header {
            font-size: medium;
        }
    }

    @media screen and (min-width: 576px) {
        #menulink {
            display: none;
        }

        #menu {
            display: none
        }
    }
</style>

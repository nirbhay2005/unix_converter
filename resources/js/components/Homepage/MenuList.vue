<template>
    <div class="mt-5" id="menu-list">
        <h2 id="heading">Pages</h2>
        <div>
            <a class="link" href="/">Home</a><br>
            <a class="link" href="/preferences">Preferences</a>
        </div>
        <div class="mt-3">
            <p @click="showItem" class="collapsible" id="tools">Tools</p>
            <div class="content mb-3">
                <a href="/">Epoch Converter</a><br>
                <a href="#">Batch Converter</a><br>
                <a href="#">Timezone Converter</a><br>
                <a href="#">Timestamp List</a><br>
            </div>
            <p @click="showItem" class="collapsible" id="date-time">Date and Time</p>
            <div class="content mb-3">
                <a href="#">Week Numbers</a><br>
                <a href="#">Weeks By Year</a><br>
                <a href="#">Day Numbers</a><br>
                <a href="#">Days By Year</a><br>
                <a href="#">Calculate the difference between two dates</a><br>
            </div>
            <p @click="showItem" class="collapsible" id="programming">Programming</p>
            <div class="content mb-3">
                <a href="#">Routines By Language</a><br>
                <a href="#">Epoch in C</a><br>
                <a href="#">Epoch in MySQL</a><br>
                <a href="#">Epoch in PHP</a><br>
            </div>
            <p @click="showItem" class="collapsible" id="more">More</p>
            <div class="content mb-3">
                <a href="#">Comments and Questions</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MenuList",
        methods: {
            showItem: function (event) {
                let m = event.currentTarget.id;
                let el = document.getElementById(m);
                el.classList.toggle("active");
                let content = el.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            },
        },
    }
</script>

<style scoped>
    .link {
        color: #1b4b72;
    }

    a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        color: #1f6fb2;
    }

    #heading {
        color: #1b4b72;
    }

    .collapsible {
        background-color: white;
        color: #1b4b72;
        cursor: pointer;
        width: 100%;
        text-align: left;
        font-weight: bold;
        font-size: 15px;
        margin: unset;
    }

    .active, .collapsible:hover {
        color: #1f6fb2;
        margin-bottom: 0px;
    }

    .collapsible:after {
        content: '\25BC';
        color: black;
        float: start;
        margin-left: 5px;
    }

    .active:after {
        content: "\25B2";
    }

    .content {
        max-height: 0;
        display: block;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        background-color: white;
        font-size: small;
        text-align: start;
        padding-left: 5px;
    }

    @media screen and (max-width: 576px) {
        #menu-list {
            display: none;
        }
    }

    @media screen and (min-width: 576px) {
        #menu-list {
            display: block;
        }
    }
</style>

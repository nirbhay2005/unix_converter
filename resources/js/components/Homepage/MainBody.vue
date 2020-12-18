<template>
    <div class="mt-4 ml-4 mr-4 row">

        <div class="d-e shadow rounded-lg">
            <epoch-to-human></epoch-to-human>
        </div>
        <div class="d-e mt-5 shadow rounded-lg">
            <date-to-epoch></date-to-epoch>
        </div>
        <div class="d-e mt-5 shadow rounded-lg">
            <human-date-to-epoch></human-date-to-epoch>
        </div>
        <div class="d-e mt-5 shadow rounded-lg">
            <begin-end></begin-end>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MainBody",
    }
</script>

<style scoped>
    .d-e {
        width: 60%;
        margin-left: 20%;
        padding: 20px;
    }

    @media screen and (max-width: 414px) {
        .d-e {
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }
    }
</style>

<template>
    <div>
        <select class="t-l shadow-sm ml-2 pt-0 rounded">
            <option class="t-c" value="GMT">GMT</option>
            <option class="t-c" value="Asia/Kolkata">Asia/Kolkata</option>
        </select><br>
    </div>
</template>

<script>
    export default {
        name: "TimezoneList"
    }
</script>

<style scoped>
    .t-l {
        height: 40px;
        width: 115px;
    }

    @media screen and  (max-width: 414px) {
        .t-l {
            height: 30px;
            width: 100px;
        }
    }

</style>

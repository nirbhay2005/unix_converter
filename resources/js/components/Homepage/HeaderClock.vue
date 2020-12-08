<template>
    <div class="mt-3 justify-content-lg-center border rounded border-dark shadow">
        <p class="mt-3 justify-content-lg-center ml-2 mr-1">The current Unix Timestamp is
            <span class="font-weight-bold" style="text-shadow: 1px 1px grey"><output id="time"></output></span>
        </p>
    </div>
</template>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    let timestamp = Math.floor(Date.now() / 1000);

    function updateTime() {
        $('#time').html((timestamp));
        timestamp++;
    }

    $(function () {
        setInterval(updateTime, 1000);
    });
</script>

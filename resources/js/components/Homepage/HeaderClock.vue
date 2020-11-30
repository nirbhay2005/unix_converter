<template>
    <div class="mt-3 justify-content-lg-center border rounded">
        <p class="mt-3 justify-content-lg-center">The current Unix Epoch time is
            <span class="font-weight-bold"><output id="time"></output></span>
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

export default {
    methods: {
        formatAMPM: function (date, tz) {
            let hours = (tz === "local") ? date.getHours() : date.getUTCHours();
            let minutes = (tz === "local") ? date.getMinutes() : date.getUTCMinutes();
            let seconds = (tz === "local") ? date.getSeconds() : date.getUTCSeconds();
            let ampm = (hours >= 12) ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            let strTime = hours + ':' + minutes + ':' + seconds;
            return [strTime, ampm];
        },
    },
};

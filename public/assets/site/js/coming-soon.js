new Vue({
    el: '#app',
    data: {
        countDownDate: new Date("Apr 13, 2019 00:00:00").getTime(),
        count: {
            days: null,
            hours: null,
            minutes: null,
            seconds: null
        },
        cronogram: false,
    },
    beforeMount: function() {
        this.currentCount()
    },
    methods: {
        currentCount: function() {
            var vue = this;
            setInterval(function() {

                var now = new Date().getTime();
                var distance = vue.countDownDate - now;
                vue.count.days = Math.floor(distance / (1000 * 60 * 60 * 24));
                vue.count.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                vue.count.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                vue.count.seconds = Math.floor((distance % (1000 * 60)) / 1000);
                if (vue.count.days < 10) vue.count.days = '0' + vue.count.days;
                if (vue.count.hours < 10) vue.count.hours = '0' + vue.count.hours;
                if (vue.count.minutes < 10) vue.count.minutes = '0' + vue.count.minutes;
                if (vue.count.seconds < 10) vue.count.seconds = '0' + vue.count.seconds;


            }, 1000);
        },
        showCronogram: function() {
            this.cronogram = true;
        },
        hideCronogram: function() {
            let vue = this;
            $(window).scrollTop(0);
            setTimeout(function() {
                vue.cronogram = false;
            }, 0);
        },

    },
});

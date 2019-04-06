new Vue({
    el: '#app',
    data: {
        countDownDate: null,
        count: {
            days: null,
            hours: null,
            minutes: null,
            seconds: null
        },
    },
    mounted: function() {
        this.initCount()
    },
    methods: {
        initCount: function() {
            this.countDownDate = new Date("May 13, 2019 00:00:00").getTime();
            this.currentCount();
            console.log(this.countDownDate)
        },
        currentCount: function() {
            var vue = this;
             setInterval(function() {

                var now = new Date().getTime();

                var distance = vue.countDownDate - now;
                vue.count.days = Math.floor(distance / (1000 * 60 * 60 * 24));
                vue.count.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                vue.count.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                vue.count.seconds = Math.floor((distance % (1000 * 60)) / 1000);


            }, 1000);
        }
    },
});

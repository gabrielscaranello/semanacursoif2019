<!-- ***** All jQuery Plugins ***** -->

<!-- jQuery (necessary for all JavaScript plugins) -->
<script src="{!!asset('assets/site/js/jquery/jquery-2.2.4.min.js')!!}"></script>
<!-- Popper js -->
<script src="{!!asset('assets/site/js/bootstrap/popper.min.js')!!}"></script>
<!-- Bootstrap js -->
<script src="{!!asset('assets/site/js/bootstrap/bootstrap.min.js')!!}"></script>
<!-- Slidea Slider JS -->
<script src="{!!asset('assets/site/slidea-assets/js/gsap/tweenlite.js')!!}" type="text/javascript"></script>
<script src="{!!asset('assets/site/slidea-assets/js/gsap/plugins/css.js')!!}" type="text/javascript"></script>
<script src="{!!asset('assets/site/slidea-assets/js/gsap/easing/easepack.js')!!}" type="text/javascript"></script>
<script src="{!!asset('assets/site/slidea-assets/js/animus/animus.js')!!}" type="text/javascript"></script>
<script src="{!!asset('assets/site/slidea-assets/js/animus/presets/default.js')!!}" type="text/javascript"></script>
<script src="{!!asset('assets/site/slidea-assets/js/hammer/hammer.js')!!}" type="text/javascript"></script>
<script src="{!!asset('assets/site/slidea-assets/js/mousewheel/mousewheel.js')!!}" type="text/javascript"></script>
<script src="{!!asset('assets/site/slidea-assets/js/vimeo/vimeo.js')!!}" type="text/javascript"></script>
<script src="{!!asset('assets/site/slidea-assets/js/youtube/youtube.js')!!}" type="text/javascript"></script>
<script src="{!!asset('assets/site/slidea-assets/js/slidea/slidea.js')!!}" type="text/javascript"></script>
<!-- Slider Active JS  -->
<script src="{!!asset('assets/site/slidea-assets/js/templates/education-slider-active.js')!!}" type="text/javascript"></script>
<!-- Plugins js -->
<script src="{!!asset('assets/site/js/include-all-plugins.js')!!}"></script>
<!-- Active js -->
<script src="{!!asset('assets/site/js/active.js')!!}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://unpkg.com/vue-gallery-slideshow"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{!!asset('assets/site/js/app.js')!!}"></script>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

{{-- <script type='text/javascript'>
    (function() {
        var widget_id = 'sOqUamefM8';
        var d = document;
        var w = window;

        function l() {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = '//code.jivosite.com/script/widget/' + widget_id;
            var ss = document.getElementsByTagName('script')[0];
            ss.parentNode.insertBefore(s, ss);
        }
        if (d.readyState == 'complete') {
            l();
        } else {
            if (w.attachEvent) {
                w.attachEvent('onload', l);
            } else {
                w.addEventListener('load', l, false);
            }
        }
    })();
</script> --}}

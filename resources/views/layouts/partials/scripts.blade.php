<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/materialize.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/abac.js') }}" type="text/javascript"></script>
@stack('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.carousel');
        var instances = M.Carousel.init(elems, {
            indicators: true,
            fullWidth: true
        });
        autoplay()
        function autoplay() {
            $('.carousel').carousel('next');
            setTimeout(autoplay, 30000);
        }

    });
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.materialboxed');
        var instances = M.Materialbox.init(elems);
    });
</script>
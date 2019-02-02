<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/vendors/js/vendor.bundle.addons.js')}}"></script>
<script src="{{asset('assets/js/shared/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/shared/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/js/shared/misc.js')}}"></script>
<script src="{{asset('assets/js/shared/settings.js')}}"></script>
<script src="{{asset('assets/js/shared/todolist.js')}}"></script>
<script src="{{asset('assets/js/demo_1/dashboard.js')}}"></script>
<script src="{{asset('assets/js/demo_1/tooltipster.bundle.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    var $video  = $('#render2'),
        $window = $(window);

    $(window).resize(function(){
        var height = $window.height();
        $video.css('height', height);

        var videoWidth = $video.width(),
            windowWidth = $window.width(),
            marginLeftAdjust =   (windowWidth - videoWidth) / 2;

        $video.css({
            'height': height,
            'marginLeft' : marginLeftAdjust
        });
    }).resize();
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Appear JavaScript -->
<script src="{{asset('js/jquery.appear.js')}}"></script>
<!-- Countdown JavaScript -->
<script src="{{asset('js/countdown.min.js')}}"></script>
<!-- Counterup JavaScript -->
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<!-- Wow JavaScript -->
<script src="{{asset('js/wow.min.js')}}"></script>
<!-- Apexcharts JavaScript -->
<script src="{{asset('js/apexcharts.js')}}"></script>
<!-- Slick JavaScript -->
<script src="{{asset('js/slick.min.js')}}"></script>
<!-- Select2 JavaScript -->
<script src="{{asset('js/select2.min.js')}}"></script>
<!-- Owl Carousel JavaScript -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup JavaScript -->
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src="{{asset('js/smooth-scrollbar.js')}}"></script>
<!-- lottie JavaScript -->
<script src="{{asset('js/lottie.js')}}"></script>
<!-- am core JavaScript -->
<script src="{{asset('js/core.js')}}"></script>
<!-- am charts JavaScript -->
<script src="{{asset('js/charts.js')}}"></script>
<!-- am animated JavaScript -->
<script src="{{asset('js/animated.js')}}"></script>
<!-- am kelly JavaScript -->
<script src="{{asset('js/kelly.js')}}"></script>
<!-- Flatpicker Js -->
<script src="{{asset('js/flatpickr.js')}}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{asset('js/chart-custom.js')}}"></script>
<!-- Custom JavaScript -->
<script src="{{asset('js/custom.js')}}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
    });

    // set file link
    function fmSetLink($url) {
        // cấu hình link
        document.getElementById('image_label').value = $url;
    }
</script>

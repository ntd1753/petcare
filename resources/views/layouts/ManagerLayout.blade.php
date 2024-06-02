<!doctype html>
<html lang="en">
@include("partial.manager.head")
<body>
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper">
    <!-- Sidebar  -->
 @include('partial.manager.sidebar')
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <!-- TOP Nav Bar -->
        @include("partial.manager.header")
        <!-- TOP Nav Bar END -->
        <div class="container-fluid">
           @yield("content")
        </div>
        <!-- Footer -->
{{--       @include("partial.manager.footer")--}}
        <!-- Footer END -->
    </div>
</div>
<!-- Wrapper END -->
@include("partial.manager.bodyJS")

</body>
</html>

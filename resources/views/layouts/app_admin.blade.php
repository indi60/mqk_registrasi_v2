<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN @yield('title') </title>


    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('camera/css/styles.css') !!}">
    <link rel="manifest" href="{!! asset('manifest.json') !!}">
    <link rel="stylesheet" href="https://unpkg.com/sweetalert@2.0.3/src/sweetalert.css">
    
    @yield('css')

</head>
<body>



  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.footer')

            @include('sweet::alert')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>


<script>
// Register Service Worker.

if ('serviceWorker' in navigator) {
    // Path is relative to the origin, not project root.
    navigator.serviceWorker.register('/pwa-photobooth/sw.js')
    .then(function(reg) {
        console.log('Registration succeeded. Scope is ' + reg.scope);
    })
    .catch(function(error) {
        console.error('Registration failed with ' + error);
    });
}
</script>


@yield('script')
@section('scripts')
@show

</body>
</html>

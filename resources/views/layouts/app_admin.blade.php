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
    

    <link rel="stylesheet" href="{!! asset('css/sweetalert2.min.css') !!}">
    
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

            

            

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/sweetalert2.min.js') !!}"></script>


<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="{!! asset('js/core.js') !!}"></script>


    <!-- Mainly scripts -->


    <script src=" {{ asset('js/jquery-3.1.1.min.js') }} "></script>
    <script src=" {{ asset('js/jquery-1.11.0.min.js') }} "></script>
    <script src=" {{ asset('js/bootstrap.min.js') }} "></script>
    <script src=" {{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }} "></script>
    <script src=" {{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }} "></script>

    <!-- Flot -->
    <script src=" {{ asset('js/plugins/flot/jquery.flot.js') }} "></script>
    <script src=" {{ asset('js/plugins/flot/jquery.flot.tooltip.min.js') }} "></script>
    <script src=" {{ asset('js/plugins/flot/jquery.flot.spline.js') }} "></script>
    <script src=" {{ asset('js/plugins/flot/jquery.flot.resize.js') }} "></script>
    <script src=" {{ asset('js/plugins/flot/jquery.flot.pie.js') }} "></script>
    <script src=" {{ asset('js/plugins/flot/jquery.flot.symbol.js') }} "></script>
    <script src=" {{ asset('js/plugins/flot/jquery.flot.time.js') }} "></script>

    <!-- Peity -->
    <script src=" {{ asset('js/plugins/peity/jquery.peity.min.js') }} "></script>
    <script src=" {{ asset('js/demo/peity-demo.js') }} "></script>


    <!-- jQuery UI -->
    <script src=" {{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }} "></script>

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

@if (notify()->ready())
    <script>
        swal({
            title: "{!! notify()->message() !!}",
            text: "{!! notify()->option('text') !!}",
            type: "{{ notify()->type() }}",
            @if (notify()->option('timer'))
                timer: {{ notify()->option('timer') }},
                showConfirmButton: false
            @endif
        });
    </script>
@endif


@yield('script')
@section('scripts')
@show

</body>
</html>

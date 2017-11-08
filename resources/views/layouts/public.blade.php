<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MQKN 2017 </title>    
    @yield('css')


    
    

        <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />


    <link rel="manifest" href="{!! asset('manifest.json') !!}">

    

</head>
<body>

    @yield('content')

            


<script src=" {{ asset('js/jquery-3.1.1.min.js') }} "></script>
    <script src=" {{ asset('js/jquery-1.11.0.min.js') }} "></script>
@yield('script')
@section('scripts')
@show

</body>
</html>

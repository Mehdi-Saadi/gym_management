<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GYM - @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="/dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/dashboard/css/sb-admin-2.min.css" rel="stylesheet">
    @yield('profile_style')
</head>

<body id="page-top" class="@yield('body-class')">

@yield('content')

<!-- Bootstrap core JavaScript-->
<script src="/dashboard/vendor/jquery/jquery.min.js"></script>
<script src="/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/dashboard/js/sb-admin-2.min.js"></script>


<!-- delete these files later -->

<!-- Page level plugins -->
{{--<script src="/dashboard/vendor/chart.js/Chart.min.js"></script>--}}

<!-- Page level custom scripts -->
{{--<script src="/dashboard/js/demo/chart-area-demo.js"></script>--}}
{{--<script src="/dashboard/js/demo/chart-pie-demo.js"></script>--}}

<!-- end delete these files later -->


<!-- select profile scripts -->
@yield('profile_script')
@include('sweetalert::alert')
</body>
</html>

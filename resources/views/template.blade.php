<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Crm Credipronto</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("css/all.min.css") }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("css/adminlte.min.css")}}">
    <!-- Bootstrap date picker -->
    <!--<link rel="stylesheet" href="{{ asset("css/bootstrap-datepicker.min.css")}}">-->
    <!--<link rel="stylesheet" href="{{ asset("css/app.css")}}">-->
</head>
<body class="hold-transition sidebar-mini text-sm">
<div class="wrapper">

    <!-- Header -->
    @include('header')

    <!-- Sidebar -->
    @include('sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- breadcrumb -->
        @include('breadcrumb')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.3 -->
<script src="{{ asset("js/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset("js/adminlte.min.js") }}"></script>
<!--<script src="{{ asset('js/script.js?time=' . date('His')) }}"></script>-->
<script src="{{ asset("js/sweetalert2.all.min.js") }}"></script>

<!-- Page specific script -->
<script>
    var _token = '{{ csrf_token() }}';
</script>
</body>
</html>

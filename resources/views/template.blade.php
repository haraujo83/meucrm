<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CrediProntoCRM</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset("css/fontawesome-free.min.css") }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{ asset("css/select2.min.css")}}">
    <link rel="stylesheet" href="{{ asset("css/select2-bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("css/daterangepicker.css")}}">
    <link rel="stylesheet" href="{{ asset("css/@sweetalert2/themes/bootstrap-4/bootstrap-4.min.css")}}">
    <link rel="stylesheet" href="{{ asset("css/waves.min.css")}}">
    <link rel="stylesheet" href="{{ asset("css/magnific-popup.css")}}">

    <link rel="stylesheet" href="{{ asset("css/app.css")}}">
    @if($existCss)
        <link rel="stylesheet" href="{{ asset("css/$module.css")}}">
    @endif

</head>
<body class="hold-transition sidebar-mini text-sm sidebar-collapse">
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

<script src="{{ asset("js/jquery.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("js/select2.full.min.js") }}"></script>
<script src="{{ asset("js/adminlte.min.js") }}"></script>
<script src="{{ asset("js/sweetalert2.all.min.js") }}"></script>
<script src="{{ asset("js/popper.min.js") }}"></script>
<script src="{{ asset("js/tippy-bundle.umd.min.js") }}"></script>
<script src="{{ asset("js/jquery.inputmask.min.js") }}"></script>
<script src="{{ asset("js/moment.min.js") }}"></script>
<script src="{{ asset("js/moment/pt-br.js") }}"></script>
<script src="{{ asset("js/select2/pt-BR.js") }}"></script>
<script src="{{ asset("js/daterangepicker.js") }}"></script>
<script src="{{ asset("js/Sortable.min.js") }}"></script>
<script src="{{ asset("js/jquery-sortable.js") }}"></script>
<script src="{{ asset("js/waves.min.js") }}"></script>
<script src="{{ asset("js/jquery.magnific-popup.min.js") }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
@if($existJs)
<script src="{{ asset("js/$module.js") }}"></script>
@endif
<!-- Page specific script -->
<script>
    var _token = '{{ csrf_token() }}';
</script>
</body>
</html>

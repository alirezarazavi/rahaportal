<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="پورتال مدیریت">
    <meta name="author" content="Alireza Razavi">
    <link rel="shortcut icon" type="image/png" href="{{URL::asset('assets/img/favicon.png')}}">
    <title>پنل مدیریت @if ($setting) | {{$setting->title}} @endif</title>
    <!-- Bootstrap Core CSS -->
    {{HTML::style('assets/css/bootstrap.min.css')}}
    <!-- MetisMenu CSS -->
    {{HTML::style('assets/css/plugins/metisMenu/metisMenu.min.css')}}
    <!-- DataTables CSS -->
    {{HTML::style('assets/css/plugins/dataTables.bootstrap.css')}}
    <!-- Tipsy Tooltip CSS -->
    {{HTML::style('assets/css/plugins/tipsy/tipsy.css')}}
    <!-- Datepicker CSS -->
    {{HTML::style('assets/css/plugins/datepicker/persianDatepicker-default.css')}}
    <!-- Time Picker -->
    {{HTML::style('assets/css/plugins/timepicker/bootstrap-timepicker.min.css')}}
    <!-- Custom CSS -->
    {{HTML::style('assets/css/sb-admin-2.css')}}
    <!-- Custom Fonts -->
    {{HTML::style('assets/font-awesome-4.1.0/css/font-awesome.min.css')}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Main CSS -->
    {{HTML::style('assets/css/style.css')}}
</head>
<body>
    
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- Header -->
            @include('layouts.header')
            <!-- Sidebar -->
            @include('layouts.sidebar')
        </nav>
        <!-- Page Content -->
        @yield('content')
    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    {{HTML::script('assets/js/jquery-1.11.0.js')}}
    <!-- Bootstrap Core JavaScript -->
    {{HTML::script('assets/js/bootstrap.min.js')}}
    <!-- Metis Menu Plugin JavaScript -->
    {{HTML::script('assets/js/plugins/metisMenu/metisMenu.min.js')}}
    <!-- DataTables JavaScript -->
    {{HTML::script('assets/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('assets/js/plugins/dataTables/dataTables.bootstrap.js')}}
    <!-- Custom Theme JavaScript -->
    {{HTML::script('assets/js/sb-admin-2.js')}}
    <!-- Tipsy Tooltip JavaScript -->
    {{HTML::script('assets/js/plugins/tipsy/jquery.tipsy.js')}}
    <!-- Persian DataPicker JavaScript -->
    {{HTML::script('assets/js/plugins/datepicker/persianDatepicker.js')}}
    <!-- Time Picker JavaScript -->
    {{HTML::script('assets/js/plugins/timepicker/bootstrap-timepicker.min.js')}}
    <!-- Main JavaSCript -->
    {{HTML::script('assets/js/script.js')}}

</body>
</html>


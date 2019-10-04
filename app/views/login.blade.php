<!DOCTYPE html>
<html lang="fa">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="پورتال مدیریت">
    <meta name="author" content="Alireza Razavi">
    <link rel="shortcut icon" type="image/png" href="{{URL::asset('assets/img/favicon.png')}}">
    <title>ورود</title>

    <!-- Bootstrap Core CSS -->
    {{HTML::style('assets/css/bootstrap.min.css')}}

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user fa-fw fa-lg"></i> ورود </h3>
                    </div>
                    <div class="panel-body">
                        @include('layouts.messages')
                        {{Form::open(array('route' => array('login'), 'method' => 'POST'))}}
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control dir-ltr" placeholder="نام کاربری" value="{{Input::old('username')}}" autofocus />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control dir-ltr" placeholder="رمز عبور" value="">
                                </div>
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--مرا بخاطر بسپار--}}
                                        {{--<input name="remember" type="checkbox" value="Remember Me">--}}
                                    {{--</label>--}}
                                {{--</div>--}}

                                <input type="submit" value="ورود" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    {{HTML::script('assets/js/jquery-1.11.0.js')}}

    <!-- Bootstrap Core JavaScript -->
    {{HTML::script('assets/js/bootstrap.min.js')}}

    <!-- Custom Theme JavaScript -->
    {{HTML::script('assets/js/sb-admin-2.js')}}

</body>

</html>

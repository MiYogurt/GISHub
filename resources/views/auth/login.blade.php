<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>GIStar Innovation Team</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ url('admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('admin/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ url('admin/css/matrix-login.css') }}" />
    <link href="{{ url('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ url('gis.jpg') }}"/>
    <link rel="stylesheet" href="{{url('admin/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{url('admin/css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{url('admin/css/matrix-media.css')}}" />
    <link rel="stylesheet" href="{{url('admin/css/jquery.gritter.css')}}" />
    @yield('stylesheet')
</head>
<body>
    <div id="loginbox" style="padding-top: 100px">
        <form id="loginform" method="post" class="form-vertical" action="{{ url('auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="control-group normal_text">
                <h3>
                    GITH
                </h3>
                <h6>（GIStar Innovation Team Hub）</h6>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"></i></span><input name="email" type="email" value="{{ old('email') }}" placeholder="邮箱..." />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input name="password" type="password" placeholder="密码..." />
                    </div>
                </div>
            </div>
            <div class="form-actions">
                {{--<span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">忘记密码?</a></span>--}}
                <span class="pull-right"><button class="btn btn-success" type="submit">登陆</button></span>
            </div>
        </form>
        <form id="recoverform" action="#" class="form-vertical">
            <p class="normal_text">输入您的邮件地址，我们将发送一封重置密码邮件到您的邮箱</p>

            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="邮件地址..." />
                </div>
            </div>

            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; 返回登陆</a></span>
                <span class="pull-right"><a class="btn btn-info">发送重置密码邮件</a></span>
            </div>
        </form>
    </div>

    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/matrix.login.js') }}"></script>
</body>

</html>
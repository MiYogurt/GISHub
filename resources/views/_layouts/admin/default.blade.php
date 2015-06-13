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
  <!--Header-part-->
    <div id="header">
        <h1><a href="{{ url('/hub') }}">Matrix Admin</a></h1>
    </div>
    <!--close-Header-part-->
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">
                        {{ Auth::user()->name }}
                    </span></a>

            </li>
            <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">信息</span><!--  <span class="label label-important">5</span> --> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> 新的信息 </a></li>
                    <li class="divider"></li>
                    <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> 收件箱 </a></li>
                    <li class="divider"></li>
                    <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> 垃圾箱 </a></li>
                </ul>
            </li>
            <li class=""><a title="" href="{{ url('/auth/logout') }}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
        </ul>
    </div>
    <!--close-top-Header-menu-->
    <!--start-top-serch-->
    <div id="search">
        <input type="text" placeholder="搜索..."/>
        <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    <!--close-top-serch-->
    <div class="copyrights">Collect from MiYogurt</div>
@yield('content')

<script src="{{ url('admin/js/jquery.min.js') }}"></script>
<script src="{{ url('admin/js/matrix.login.js') }}"></script>
</body>

</html>
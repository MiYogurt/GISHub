@extends('_layouts.admin.default')

@section('content')

    <!--sidebar-menu-->
    <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-dashboard"></i> 仪表盘</a>
        <ul>
            <li><a href="{{ url('/hub') }}"><i class="icon icon-dashboard"></i> <span>仪表盘</span></a> </li>
            <li> <a href="{{ url('/hub/bubble') }}"><i class="icon  icon-comments-alt"></i> <span>冒泡</span></a> </li>
            <li class="active"><a href="{{ url('/hub/user') }}"><i class="icon icon-user"></i> <span>成员</span></a></li>
            <li><a href="{{ url('/hub/something') }}"><i class="icon icon-bullhorn"></i> <span>合作信息</span></a></li>
            <li class="submenu"> <a href="#"><i class="icon icon-inbox"></i> <span>项目</span> <span class="label label-important">2</span></a>
                <ul>
                    <li><a href="{{ url('hub/project/create') }}">创建项目</a></li>
                    <li><a href="{{ url('hub/project') }}">查看所有项目</a></li>
                </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="icon icon-star"></i> <span>分享</span> <span class="label label-important">3</span></a>
                <ul>
                    <li><a href="{{ url('hub/jishu') }}">技术</a></li>
                    <li><a href="{{ url('hub/qinggan') }}">情感</a></li>
                    <li><a href="{{ url('hub/shenghuo') }}">生活</a></li>
                </ul>
            </li>
            <li> <a href="{{ url('/hub/time') }}"><i class="icon icon-bell"></i> <span>叮咚时间助手</span></a> </li>
        </ul>
    </div>
    <!--sidebar-menu-->
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->

        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 主页</a></div>
        </div>
        <!--End-breadcrumbs-->
        @if(isset($error))
            <div class="alert alert-error">
                <button class="close" data-dismiss="alert">×</button>
                <strong>Error!</strong> {{ $error->first() }}
            </div>
        @endif
        <!--Action boxes-->
        <div class="container-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-user"></i></span>
                    <h5>添加用户</h5>
                    <a class="btn btn-mini btn-info" href="javascript:window.history.go(-1);" style="float: right;padding: 7px;">返回</a>
                </div>
                <div class="widget-content nopadding">
                    <form action="{{ url('/hub/adduser') }}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="control-group">
                            <label class="control-label">用户名 :</label>
                            <div class="controls">
                                <input type="text" name="name" class="span8" placeholder="用户名...">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">电话 :</label>
                            <div class="controls">
                                <input type="tel" class="span8" name="tel" placeholder="联系方式...">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">邮箱 :</label>
                            <div class="controls">
                                <input type="email" class="span8" name="email" placeholder="邮箱...(唯一否则插入失败)">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">密码 ：</label>
                            <div class="controls">
                                <input type="password" name="password" class="span8" placeholder="密码...">
                            </div>
                        </div><div class="control-group">
                            <label class="control-label">密码确认 ：</label>
                            <div class="controls">
                                <input type="password" name="password_confirmation" class="span8" placeholder="密码确认...">
                            </div>
                        </div>
                        <div class="form-actions" style="border: none">
                            <button type="submit" class="btn btn-success">提交</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12"> Power by Matrix Admin laravel </div>
    </div>
    <!--end-Footer-part-->
    <!--end-main-container-part-->

    <script src="{{ url('admin/js/excanvas.min.js')}}"></script>
    <script src="{{ url('admin/js/jquery.min.js')}}"></script>
    <script src="{{ url('admin/js/jquery.ui.custom.js')}}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('admin/js/jquery.flot.min.js')}}"></script>
    <script src="{{ url('admin/js/jquery.flot.resize.min.js')}}"></script>
    <script src="{{ url('admin/js/jquery.peity.min.js')}}"></script>
    <script src="{{ url('admin/js/fullcalendar.min.js')}}"></script>
    <script src="{{ url('admin/js/matrix.js')}}"></script>
    <script src="{{ url('admin/js/matrix.dashboard.js')}}"></script>
    <script src="{{ url('admin/js/jquery.gritter.min.js')}}"></script>
    <script src="{{ url('admin/js/matrix.interface.js')}}"></script>
    <script src="{{ url('admin/js/matrix.chat.js')}}"></script>
    <script src="{{ url('admin/js/jquery.validate.js')}}"></script>
    <script src="{{ url('admin/js/matrix.form_validation.js')}}"></script>
    <script src="{{ url('admin/js/jquery.wizard.js')}}"></script>
    <script src="{{ url('admin/js/jquery.uniform.js')}}"></script>
    <script src="{{ url('admin/js/select2.min.js')}}"></script>
    <script src="{{ url('admin/js/matrix.popover.js')}}"></script>
    <script src="{{ url('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('admin/js/matrix.tables.js')}}"></script>

    <script type="text/javascript">
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage (newURL) {

            // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {

                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-" ) {
                    resetMenu();
                }
                // else, send page to designated URL
                else {
                    document.location.href = newURL;
                }
            }
        }

        // resets the menu selection upon entry to this page:
        function resetMenu() {
            document.gomenu.selector.selectedIndex = 2;
        }
    </script>
    </script>
@stop

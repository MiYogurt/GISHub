@extends('_layouts.admin.default')

@section('stylesheet')

<link rel="stylesheet" href="{{ url('admin/css/bootstrap-wysihtml5.css') }}" />
<link rel="stylesheet" href="{{ url('admin/css/select2.css') }}" />
<link rel="stylesheet" href="{{ url('admin/css/uniform.css') }}" />

@endsection

@section('content')

    <!--sidebar-menu-->
    <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-dashboard"></i> 仪表盘</a>
        <ul>
            <li><a href="{{ url('/hub') }}"><i class="icon icon-dashboard"></i> <span>仪表盘</span></a> </li>
            <li> <a href="{{ url('/hub/bubble') }}"><i class="icon  icon-comments-alt"></i> <span>每日一句</span></a> </li>
            <li><a href="{{ url('/hub/user') }}"><i class="icon icon-user"></i> <span>成员</span></a></li>
            <li><a href="{{ url('/hub/something') }}"><i class="icon icon-bullhorn"></i> <span>合作信息</span></a></li>

            <li class="submenu active"> <a href="#"><i class="icon icon-inbox"></i> <span>项目</span> <span class="label label-important">2</span></a>
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
            <div id="breadcrumb"> <a href="{{ url('/hub') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 主页</a></div>
        </div>
        <!--End-breadcrumbs-->
        @if(!empty($errors->first()))
            <div class="alert alert-error">
                <button class="close" data-dismiss="alert">×</button>
                <strong>出错了!</strong> {{ $errors->first() }}
            </div>
        @endif
        <!--Action boxes-->
        <div class="container-fluid">
            <!--Chart-box-->
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title">
                        <h5>创建一个新项目</h5>
                    </div>
                    <div class="clearfix"></div>

                    <div class="widget-content" >
                        <form action="{{ url('hub/project/') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="POST"/>
                                <div class="control-group">
                                <label class="control-label">项目名称 :</label>
                                <div class="controls">
                                  <input type="text" class="span11" name="name" placeholder="">
                                </div>
                              </div>

                            <div class="control-group">
                                  <label class="control-label">项目简介 :</label>
                                  <div class="controls">
                                    <input type="text" class="span11" name="description" placeholder="">
                                  </div>
                            </div>
                            <div class="control-group">
                                  <label class="control-label">项目负责人 :</label>
                                  <div class="controls">
                                    <input type="text" class="span11" name="project_duty" placeholder="">
                                  </div>
                            </div>
                            <div class="control-group">
                                  <label class="control-label">项目成员 :</label>
                                  <div class="controls">
                                    <input type="text" class="span11" name="project_user" placeholder="多个请用(中文逗号)，分开">
                                  </div>
                            </div>
                            <div class="control-group">
                                  <label class="control-label">项目完成时间 :</label>
                                  <div class="controls">
                                    <input type="date" class="span11" name="finish" placeholder="">
                                  </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">项目封面图片</label>
                              <div class="controls">
                                <input type="file" name="img_face">
                              </div>
                            </div>
                            <div class="control-group">
                                 <div class="controls">
                            <button type="submit" class="btn btn-success">创建</button>
                        </div>
                            </div>
                        </form>
                    </div>
            </div>
            <!--End-Chart-box-->
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
@stop

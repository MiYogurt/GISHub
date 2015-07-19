@extends('_layouts.admin.default')

@section('content')

    <!--sidebar-menu-->
    <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-dashboard"></i> 仪表盘</a>
        <ul>
            <li class="active"><a href="{{ url('/hub') }}"><i class="icon icon-dashboard"></i> <span>仪表盘</span></a> </li>
            <li> <a href="{{ url('/hub/bubble') }}"><i class="icon  icon-comments-alt"></i> <span>每日一句</span></a> </li>
            <li><a href="{{ url('/hub/user') }}"><i class="icon icon-user"></i> <span>成员</span></a></li>
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

        <!--Action boxes-->
        <div class="container-fluid">
            <div class="quick-actions_homepage">
                <ul class="quick-actions">
                    <li class="bg_ls span3"> <a href="{{ url('/hub/heard') }}"> <i class="icon-signal"></i> 每日必看</a> </li>
                    <li class="bg_lo span3"> <a href="{{ url('/hub/howtostudy') }}"> <i class="icon-signal"></i> 学习指南</a> </li>
                    <li class="bg_lg span3"> <a href="{{ url('/hub/mustknow') }}"> <i class="icon-signal"></i> 入团须知</a> </li>
                </ul>
            </div>
            <!--End-Action boxes-->

            <!--Chart-box-->
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title bg_lg"><span class="icon"><i class="icon-home"></i></span>
                        <h5>队内信息</h5>
                    </div>
                    <div class="widget-content" >
                        <div class="row-fluid">
                            <div class="span9">
                                <div class="chart">
                                    <?php echo $data['notice'] ?>
                                </div>
                            </div>
                            <div class="span3">
                                <ul class="site-stats">
                                    <li class="bg_lh"><i class="icon-user"></i> <strong>{{ isset($data['user'])?$data['user']:0 }}</strong> <small>所有会员</small></li>
                                    <li class="bg_lh"><i class="icon-inbox"></i> <strong>{{ isset($data['project'])?$data['project']:0 }}</strong> <small>所有项目 </small></li>
                                    <li class="bg_lh"><i class="icon-star"></i> <strong>{{isset($data['share'])?$data['share']:0 }}</strong> <small>所有分享</small></li>
                                    <li class="bg_lh">
                                        <i class="icon-edit"></i> <a href="{{ url('hub/notice/1/edit') }}" style="display: block;color: #EEEEEE"><strong>&nbsp;</strong> <small>修改公告</small></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End-Chart-box-->
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
@stop

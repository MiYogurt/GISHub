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

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 主页/学习指南</a></div>
        </div>
        <!--Chart-box-->
        <div class="row-fluid">
            <div class="widget-content" >
                <div class="row-fluid">
                    <div class="span12">
                        <h1>学习指南</h1>
                        <p style="float: right;">（永远别忘记付出不亚于任何人的努力）</p>
                        <p style="float: right;clear: right">（无论是哪一个学习周期都很长，高薪水，并不是那么容易拿的）</p>
                        <ul>
                            <li>
                                <h6>PS高级应用工程师</h6>
                                <p>主要学习还是PS 可以多学习一些平面设计，三维设计</p>
                            </li>
                            <li>
                                <h6>前端工程师</h6>
                                <p>主要学习还是JavsScript CSS3 HTML5 以及一些框架工具：JQuery Angular Gulp Sass Compass</p>
                            </li>
                            <li>
                                <h6>PHP工程师</h6>
                                <p>主要学习还是PHP MySQL数据库基本使用 以及一些框架工具：ThinkPHP Laravel</p>
                            </li>
                            <li>
                                <h6>ArcGIS工程师</h6>
                                <p>主要学习还是ESRI公司的软件应用，需要学习一定的Java知识</p>
                            </li>
                            <li>
                                <h6>维护工程师</h6>
                                <p>主要学习还是Linux操作系统 服务器搭建与维护，数据库优化</p>
                            </li>
                            <li>
                                <h6>全栈工程师</h6>
                                <p>（是指掌握多种技能，并能利用多种技能独立完成产品的人）<br>（后台可选语言：Nodejs Python PHP Go）<br>具备前后端开发能力，掌握一门CMS。从PS的UI设计，到前端静态页面的编写，会利用工具（对产品架构，需要什么工具，什么技术等）实现自动化。<br>需要一定的linux基础，MySQL基础、MongoDB基础、网络原理基础、服务器的简单运维。</p>
                            </li>
                        </ul>
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

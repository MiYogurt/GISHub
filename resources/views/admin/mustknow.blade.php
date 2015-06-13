@extends('_layouts.admin.default')

@section('content')

    <!--sidebar-menu-->
    <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-dashboard"></i> 仪表盘</a>
        <ul>
            <li class="active"><a href="{{ url('/hub') }}"><i class="icon icon-dashboard"></i> <span>仪表盘</span></a> </li>
            <li> <a href="{{ url('/hub/bubble') }}"><i class="icon  icon-comments-alt"></i> <span>冒泡</span></a> </li>
            <li><a href="{{ url('/hub/user') }}"><i class="icon icon-user"></i> <span>成员</span></a></li>
            <li><a href="{{ url('/hub/something') }}"><i class="icon icon-bullhorn"></i> <span>合作信息</span></a></li>

            <li class="submenu"> <a href="#"><i class="icon icon-inbox"></i> <span>项目</span> <span class="label label-important">2</span></a>
                <ul>
                    <li><a href="form-common.html">创建项目</a></li>
                    <li><a href="form-validation.html">查看所有项目</a></li>
                </ul>
            </li>
            <li class="submenu"> <a href="#"><i class="icon icon-star"></i> <span>分享</span> <span class="label label-important">3</span></a>
                <ul>
                    <li><a href="{{ url('hub/jishu') }}">技术</a></li>
                    <li><a href="{{ url('hub/qinggan') }}">情感</a></li>
                    <li><a href="{{ url('hub/shenghuo') }}">生活</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <!--sidebar-menu-->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 主页/入团须知</a></div>
        </div>
        <!--Chart-box-->
        <div class="row-fluid">
            <div class="widget-content" >
                <div class="row-fluid">
                    <div class="span9">
                        <h1>入团须知</h1>
                        <p style="float: right">（请每一位人员仔细阅读）</p>
                        <ul>
                            <li>本平台向所有会员开放所有管理权限</li>
                            <li>您的每一次删除操作有可能危害到他人，请慎重。</li>
                            <li>特别是用户操作，一经发现为了一己私欲随意串改，我们会认为你的素质是有问题的!永不录用。</li>
                            <li>对于自己所书写的，您拥有所有权。</li>
                            <li>不努力学习的，一律请出去，一个没有梦想的人，我们是不欢迎的，哪怕是摒弃。</li>
                            <li>创新中心那边的事，或许很多，但毕竟是一个团队，假如你不理解什么是团队，那么等你弄清楚了再来加入我们。</li>
                            <li>希望大家积极的参加项目，不要忘记了自己的初衷，来到这里就是变得更优秀，你并没有对团队付出什么，那么你也得不到什么。</li>
                            <li>我们不需要酱油，我需要的一群梦想极客家，哪怕只有我一个。</li>
                            <li>学习是需要分享的，只有分享的学习才能更有乐趣，所以我们大力推崇，写分享文章。</li>
                        </ul>
                    </div>
                    <div class="span3">
                        <img src="{{ url('admin/images/some/mustknow.jpg') }}" alt="人为什么活着"/>
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
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
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 主页/六项精进</a></div>
        </div>
            <!--Chart-box-->
            <div class="row-fluid">
                    <div class="widget-content" >
                        <div class="row-fluid">
                            <div class="span9">
                                <h1>六项精进</h1>
                                <p style="float: right">（队长寄语：希望大家都能找到潜力无限的自己）</p>
                                <ol>
                                    <li>付出不亚于任何人的努力</li>
                                    <li>要谦虚,不要骄傲</li>
                                    <li>要每天反省</li>
                                    <li>活着,就要感谢</li>
                                    <li>积善行,思利他</li>
                                    <li>忘却感性的烦恼</li>
                                </ol>
                                <p>相关人物：<br/>稻盛和夫白手起家，先后创建了<font color="#a52a2a">京瓷和KDDI两家世界五百强企业</font>；2010年2月1日，他临危受命出任破产重建的日航CEO，在不到半年的时间内，就让日航大幅度扭亏为盈，在2010年年底创造了日航历史上空前的<font color="#a52a2a">1500亿日元的利润</font>。人们常说：经营战略最重要，经营战术不可少。但稻盛先生却断言：“除了拼命工作之外，世界上不存在更高明的经营诀窍。” 他在年轻时就提出了“六项精进”，在他看来，“六项精进”是搞好企业经营所必须的最基本条件，同时也是度过美好人生必须遵守的最基本条件。<font color="#a52a2a">如果人们能够日复一日地持续实践这“六项精进”，人生必将更加美好，美好的程度甚至超乎我们自己的能力和想象。</font>稻盛先生说：“我自己的人生就是如此。”本课程再现了稻盛和夫先生为日本2555名企业家塾生作演讲的精彩画面。在他演讲的过程中，全场鸦雀无声，其演讲给了与会者前所未有的感动和震撼，相信这样的精彩内容对于中国的企业家，对于各行各业各级领导，对于渴望成功的有识之士，<font color="#a52a2a">对于一切有志于追求人生真理的年轻人，都具有莫大的、难以估量的参考价值。</font></p>
                            </div>
                            <div class="span3">
                                <img src="{{ url('admin/images/some/book.jpg') }}" alt="人为什么活着"/>
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
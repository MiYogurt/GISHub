@extends('_layouts.proscenium.default')@section('content')<!-- start templatemo navigation --><nav class="navbar navbar-default navbar-fixed-top" role="navigation">  <div class="container">    <div class="navbar-header">      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">        <span class="icon icon-bar"></span>        <span class="icon icon-bar"></span>        <span class="icon icon-bar"></span>      </button>      <a href="javascript:viod(0)" class="navbar-brand">GIStar创新团队</a>    </div>    <div class="collapse navbar-collapse">      <ul class="nav navbar-nav navbar-right">        <li><a href="#top" class="smoothScroll">主页</a></li>        <li><a href="#features" class="smoothScroll">设计理念</a></li>        <li><a href="#about" class="smoothScroll">关于我们</a></li>        <li><a href="#team" class="smoothScroll">我们的团队</a></li>        <li><a href="#portfolio" class="smoothScroll">我们的作品</a></li>        <li><a href="#contact" class="smoothScroll">联系方式</a></li>      </ul>    </div>  </div></nav><!-- end templatemo navigation --><section id="home" class="text-center">  <div class="templatemo_headerimage">    <div class="flexslider">      <ul class="slides">        <li>          <img src="{{ url('proscenium/images/slider/1.jpg') }}" alt="Slide 1">          <div class="slider-caption">          <div class="templatemo_homewrapper">            <h1>创意的网页设计</h1>            <h2>网页设计 &amp; 用代码书写你的梦想</h2>          <a href="#portfolio" class="smoothScroll templatemo-slider-btn btn btn-default">我们的作品</a>          </div>        </div>        </li>        <li>          <img src="{{ url('proscenium/images/slider/2.jpg') }}" alt="Slide 2">          <div class="slider-caption">          <div class="templatemo_homewrapper">            <h1>ESRI&nbsp;公司合作</h1>            <h2>国外公司合作，在信息的时代，一起挖掘地理的价值</h2>          <a href="#features" class="smoothScroll templatemo-slider-btn btn btn-default">设计理念</a>          </div>        </div>        </li>        <li>          <img src="{{ url('proscenium/images/slider/3.jpg') }}" alt="Slide 3">          <div class="slider-caption">          <div class="templatemo_homewrapper">              <h1>饱满极客精神</h1>              <h2>本着付出不亚于任何人的努力，追求极致，成功自然来的口号，一路前进。</h2>          <a href="#about" class="smoothScroll templatemo-slider-btn btn btn-default">我们的团队</a>          </div>        </div>        </li>      </ul>    </div>  </div></section><!-- start templatemo features --><section id="features" class="features text-center">  <div class="container">    <div class="row">      <div class="col-md-2"></div>      <div class="col-md-8">        <h2>追求完美的视觉效果</h2>        <p>只有不断的追求，才能更完美。完美的作品离不开合作，我们是一个团队。我们这里有</p><p>  <span style="color: #CC9966">PS高级应用师</span> &nbsp;  <span style="color: #CC9966">前端工程师</span> &nbsp;  <span style="color: #CC9966">PHP工程师</span> &nbsp;    <span style="color: #CC9966">ArcGIS工程师</span> &nbsp;   <span style="color: #CC9966">全栈工程师</span> &nbsp;</p>      </div>      <div class="col-md-12"></div>      <div class="col-sm-6 col-md-3">        <a href="javascript:viod(0)"><i class="fa fa-laptop"></i></a>          <h3>响应式的网页设计</h3>          <p>适配各种终端，大屏电脑，笔记本，平板，手机，都能友好的浏览，拥有了一个网站，您就相当于拥有了所有的用户。</p>      </div>      <div class="col-sm-6 col-md-3">        <a href="javascript:viod(0)"><i class="fa fa-thumbs-up"></i></a>          <h3>基于Bootstrap 3</h3>          <p>Bootstrap是Twitter推出的一个用于前端开发的开源工具包。它由Twitter的设计师Mark Otto和Jacob Thornton合作开发,是一个CSS/HTML框架</p>      </div>      <div class="col-sm-6 col-md-3">        <a href="javascript:viod(0)"><i class="fa fa-rocket"></i></a>          <h3>基于Laravel</h3>          <p>Laravel是一套简洁、优雅的PHP Web开发框架(PHP Web Framework)。一个优雅的极客开发出来的产品，将会是绝对优雅。</p>      </div>      <div class="col-sm-6 col-md-3">        <a href="javascript:viod(0)"><i class="fa fa-cog"></i></a>          <h3>ArcGIS定制化</h3>          <p>可与ArcGIS结合，更接近底层的定制，成为复合型网站，找寻一个大数据解决方案，挖掘信息时代的地理价值。</p>      </div>    </div>  </div></section><!-- end templatemo features --><!-- start templatemo about --><section id="about">  <div class="container">    <div class="row">      <div class="col-md-2"></div>      <div class="col-md-8 text-center">        <h2>关于我们</h2>        <p>以付出不亚于任何人的努力为口号，我们在 <span class="green">极客学院/慕课网</span> 学习进修。<br>追求这不一样的体验，同时追求着不一样的人生。</p>      </div>      <div class="col-md-12"></div>      <div class="col-sm-6 col-md-6 info">        <h3>我们是一个团队</h3>        <h4>和谐，有共同梦想的团队，同时也期待您的加入。</h4>        <p>我们有一套非常规范化的流程，正如你所见的：<br> 我们使用前端自动化 Gulp、Sass、Compass 前后端分离,便于更好的合作，ArcGIS则是额外的定制。</p>        <p>相对于后台而言，使用PHP语言，并且我们不采用 Apache 服务器，而使用 Nginx 服务器，能提高您服务器的负载，让上万人在线不是任何问题。</p>      </div>      <div class="col-sm-6 col-md-6 skills">        <span>HTML5 技能指数</span>          <span class="pull-right">100%</span>            <div class="progress">              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>            </div>        <span>PHOTOSHOP 技能指数</span>          <span class="pull-right">100%</span>            <div class="progress">              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>            </div>        <span>CSS3 技能指数</span>          <span class="pull-right">100%</span>            <div class="progress">              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>            </div>        <span>PHP 技能指数</span>          <span class="pull-right">100%</span>            <div class="progress">              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>            </div>      </div>    </div>  </div></section><!-- end templatemo about --><!-- start templatemo team --><section id="team" class="text-center">  <div class="container">    <div class="row">      <div class="col-md-2"></div>      <div class="col-md-8">        <h2>我们的团队</h2>        <p>都是这些人，在撑起一片天</p>      </div>      <div class="col-md-12"></div>      <div class="col-sm-6 col-md-3">        <img src="{{ url('proscenium/images/cc.jpg') }}" class="img-responsive" alt="team 1">          <h3>陈微明</h3>          <p>全栈工程师</p>      </div>      <div class="col-sm-6 col-md-3">        <img src="{{ url('proscenium/images/sxr.jpg') }}" class="img-responsive" alt="team 2">          <h3>石祥瑞</h3>          <p>UI设计师</p>      </div>      <div class="col-sm-6 col-md-3">        <img src="{{ url('proscenium/images/lxm.jpg') }}" class="img-responsive" alt="team 3">          <h3>鲁小猛</h3>          <p>PS应用师</p>      </div>      <div class="col-sm-6 col-md-3">        <img src="{{ url('proscenium/images/mbk.jpg') }}" class="img-responsive" alt="team 4">          <h3>马百科</h3>          <p>PHP工程师</p>      </div>    </div>  </div></section><!-- end templatemo team --><!-- start templatemo portfolio --><section id="portfolio">  <div class="container text-center">    <div class="row">      <div class="col-md-2"></div>      <div class="col-md-8">        <h2>我们的作品</h2>        <p>喜欢，就狠狠的戳击一下，给一个赞</p>      </div>      <div class="col-md-12"></div>      <div class="col-sm-6 col-md-3">          <h3>仿制360小说</h3>        <div class="image_thumb">          <img src="{{ url('proscenium/images/360story.jpg') }}" class="img-responsive" alt="work">            <div class="image_overlay">              <a href="javascript:viod(0)"><i class="fa fa-thumbs-o-up"></i></a>            </div>        </div>      </div>        <div class="col-sm-6 col-md-3">          <h3>校园电子地图</h3>        <div class="image_thumb">          <img src="{{ url('proscenium/images/map.jpg') }}" class="img-responsive" alt="work">            <div class="image_overlay">              <a href="javascript:viod(0)"><i class="fa fa-thumbs-o-up"></i></a>            </div>        </div>      </div>        <div class="col-sm-6 col-md-3">          <h3>GIS的宿舍管理系统</h3>        <div class="image_thumb">          <img src="{{ url('proscenium/images/sushe.jpg') }}" class="img-responsive" alt="work">            <div class="image_overlay">              <a href="javascript:viod(0)"><i class="fa fa-thumbs-o-up"></i></a>            </div>        </div>      </div>        <div class="col-sm-6 col-md-3">          <h3>GIS牙科医院导航</h3>        <div class="image_thumb">          <img src="{{ url('proscenium/images/yake.jpg') }}" class="img-responsive" alt="work">            <div class="image_overlay">              <a href="javascript:viod(0)"><i class="fa fa-thumbs-o-up"></i></a>            </div>        </div>      </div>      {{--<div class="col-sm-6 col-md-3">--}}        {{--<div class="image_thumb">--}}          {{--<img src="{{ url('proscenium/images/p2.jpg') }}" class="img-responsive" alt="work">--}}            {{--<div class="image_overlay">--}}              {{--<a href="javascript:viod(0)"><i class="fa fa-thumbs-o-up"></i></a>--}}            {{--</div>--}}        {{--</div>--}}      {{--</div>--}}      {{--<div class="col-sm-6 col-md-3">--}}        {{--<div class="image_thumb">--}}          {{--<img src="{{ url('proscenium/images/p3.jpg') }}" class="img-responsive" alt="work">--}}            {{--<div class="image_overlay">--}}              {{--<a href="javascript:viod(0)"><i class="fa fa-thumbs-o-up"></i></a>--}}            {{--</div>--}}        {{--</div>--}}      {{--</div>--}}      {{--<div class="col-sm-6 col-md-3">--}}        {{--<div class="image_thumb">--}}          {{--<img src="{{ url('proscenium/images/p4.jpg') }}" class="img-responsive" alt="work">--}}            {{--<div class="image_overlay">--}}                {{--<a href="javascript:viod(0)"><i class="fa fa-thumbs-o-up"></i></a>--}}            {{--</div>--}}        {{--</div>--}}      {{--</div>--}}      {{--<div class="col-sm-6 col-md-3">--}}        {{--<div class="image_thumb">--}}          {{--<img src="{{ url('proscenium/images/p5.jpg') }}" class="img-responsive" alt="work">--}}            {{--<div class="image_overlay">--}}              {{--<a href="javascript:viod(0)"><i class="fa fa-thumbs-o-up"></i></a>--}}            {{--</div>--}}        {{--</div>--}}      {{--</div>--}}      {{--<div class="col-sm-6 col-md-3">--}}        {{--<div class="image_thumb">--}}          {{--<img src="{{ url('proscenium/images/p6.jpg') }}" class="img-responsive" alt="work">--}}            {{--<div class="image_overlay">--}}              {{--<a href="javascript:viod(0)"><i class="fa fa-thumbs-o-up"></i></a>--}}            {{--</div>--}}        {{--</div>--}}      {{--</div>--}}      {{--<div class="col-sm-6 col-md-3">--}}        {{--<div class="image_thumb">--}}          {{--<img src="{{ url('proscenium/images/p7.jpg') }}" class="img-responsive" alt="work">--}}            {{--<div class="image_overlay">--}}              {{--<a href="javascript:viod(0)"><i class="fa fa-thumbs-o-up"></i></a>--}}            {{--</div>--}}        {{--</div>--}}      {{--</div>--}}      {{--<div class="col-sm-6 col-md-3">--}}        {{--<div class="image_thumb">--}}          {{--<img src="{{ url('proscenium/images/p8.jpg') }}" class="img-responsive" alt="work">--}}            {{--<div class="image_overlay">--}}              {{--<a href="javascript:viod(0)"><i class="fa fa-thumbs-o-up"></i></a>--}}            {{--</div>--}}        {{--</div>--}}      </div>    </div>  </div></section><!-- end templatemo portfolio --><!-- start templatemo contact --><section id="contact">  <div class="container">    <div class="row">      <div class="col-md-2"></div>      <div class="col-md-8 text-center">        <h2>联系我们</h2>        <p>您有什么想说的，想做的，请在下列留言。<br>管理员将在后台接收您的信息，并与您取得联系。我们非常期待您的加入，或者商业化合作。</p>      </div>      <div class="col-md-12"></div>      <div class="col-sm-6 col-md-4 address">        <h3>我们的地址</h3>        <p><i class="fa fa-phone"></i>  18408459676（负责人）</p>        <p><i class="fa fa-envelope-o"></i>1281382675@qq.com</p>        {{--<p><i class="fa fa-globe"></i> <a href="javascript:viod(0)">http://www.company.com</a></p>--}}        <p><i class="fa fa-map-marker"></i> 北方民族大学实验楼6楼A614</p>      </div>      <div class="col-sm-6 col-md-8">        <form action="{{ url('hub/something') }}" method="post" role="form">            <input type="hidden" name="_token" value="{{ csrf_token() }}">          <div class="col-md-6">            <input type="text" class="form-control" name="name" placeholder="名称" required="required">          </div>          <div class="col-md-6">            <input type="email" class="form-control" name="email" placeholder="邮件" required="required">          </div>          <div class="col-md-12">            <input type="text" class="form-control" name="description" placeholder="简介" required="required">          </div>          <div class="col-md-12">            <textarea class="form-control" rows="6" name="message" placeholder="您想要提交的信息..." required="required"></textarea>          </div>          <div class="col-md-12">            <input type="submit" value="发送信息" class="form-control">          </div>        </form>      </div>    </div>  </div></section><!-- end templatemo contact --><!-- start templatemo footer --><footer class="text-center">  <div class="container">    {{--<div class="row">--}}      {{--<div class="social_icon">--}}        {{--<a href="javascript:viod(0)" class="fa fa-facebook"></a>--}}        {{--<a href="javascript:viod(0)" class="fa fa-twitter"></a>--}}        {{--<a href="javascript:viod(0)" class="fa fa-linkedin"></a>--}}        {{--<a href="javascript:viod(0)" class="fa fa-tumblr"></a>--}}      {{--</div>--}}        <div class="copyright">            @if(isset($message))                <p id="message" style="display: none">{{ $message }}</p>            @endif            Copyright © 2015-2020&nbsp;<strong><a href="{{ url('auth/login') }}">GIStar 创新团队</a></strong> All Rights Reversed.        </div>    </div>  </div></footer><!-- end templatemo footer --><script>    window.onload = function () {        _mes = $("p#message").text() != "" ? $("p#message").text() : 0;        if (_mes) {            alert(_mes)        }else {            return        }    };</script>@stop
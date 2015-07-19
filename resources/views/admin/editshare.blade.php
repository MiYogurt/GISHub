<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>GIStar&nbsp;创新团队</title>
    <link rel="stylesheet" href="{{ url('proscenium/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('proscenium/css/templatemo_style.css') }}">
    <link rel="stylesheet" href="{{ url('proscenium/css/font-awesome.min.css') }}">
    <link rel="shortcut icon" href="{{ url('gis.jpg') }}"/>
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse">

<form class="form-group" enctype="multipart/form-data" action="{{ empty($share)? url('/hub/share/'): url('/hub/share/'.$share->id)}} }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="hidden" name="_method" value="{{ empty($share)?'POST':'PUT' }}"/>

    <div>
        <label class="label label-success" style="position:relative;top:-2px;margin-left:5px;">文章标题</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="title" value="{{ empty(!old('title'))?old('title'):$share->title }}" style="margin-top: 2px;width: 500px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label class="label label-success" style="margin-left:5px;position:relative;top:-2px;margin-right:5px">请选择分类</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <label style="margin-left:5px;margin-right:5px">请选择分类</label>
        <input type="radio" name="cate" value="1" @if($share->cate == 1)checked="checked" @endif />技术
        <input type="radio" name="cate" value="2" @if($share->cate == 2)checked="checked" @endif/>情感
        <input type="radio" name="cate" value="3" @if($share->cate == 3)checked="checked" @endif/>生活
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="提交" class="btn btn-mini btn-primary" style="height: 20px;line-height: 6px;float: right;margin-top: 4px;margin-right: 5px;"/>
        <a href="javascript:history.back()" style="height: 20px;line-height: 6px;float: right;margin-top: 4px;margin-right: 5px;"  class="btn btn-mini btn-primary">返回</a>
    </div>
    <div class="editor" style="width: 100%;">
        <textarea name="content" id='myEditor'>{{ empty(!old('content'))?old('content'):$share->content }}</textarea>
    </div>
</form>

@if(!empty($errors->first()))
    <div class="alert alert-error">
        <i class="icon-remove-sign"></i>
        {{ $errors->first() }}
    </div>
@endif

<script src="{{ url('proscenium/js/jquery.js') }}"></script>
@include('editor::head')
<script src="{{ url('proscenium/js/bootstrap.min.js') }}"></script>
<script src="{{ url('proscenium/js/smoothscroll.js') }}"></script>
<script src="{{ url('proscenium/js/jquery.flexslider.js') }}"></script>

<!-- start templatemo back to top js -->
<script>
    $(document).ready(function() {
        // FlexSlider
        $('.flexslider').flexslider({
            animation: "fade",
            directionNav: false
        });

        // Show or hide the sticky footer button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                $('.go-top').fadeIn(200);
            } else {
                $('.go-top').fadeOut(200);
            }
        });
        // Animate the scroll to top
        $('.go-top').click(function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, 300);
        })
    });
</script>
<!-- end templatemo back to top js -->
</body>
</html>

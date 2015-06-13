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

      @yield('content')



      <script src="{{ url('proscenium/js/jquery.js') }}"></script>
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

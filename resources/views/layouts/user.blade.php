<!DOCTYPE html>
<html lang="en">
<head>
<title>SD </title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="ingenious a Responsive Widget Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--/metatags-->
<link href="assets/user/css/bootstrap.css" rel="stylesheet" /> <!--bootstrap-css-->
<link href="assets/user/css/style.css" rel="stylesheet"/> <!--style-css-->
<link rel="stylesheet" href="assets/user/css/lightbox.min.css"><!--lightbox-->
<link href="assets/user/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="assets/user/css/font-awesome.min.css" rel="stylesheet" /><!--fontawesome-css-->
<link href="//fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<section class="agile-navigation">
	<div class="container">
	<nav class="navbar navbar-default">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <h1>
				  <a class="navbar-brand" href="index.html"><span>W</span>SD</a>
				  </h1>
			</div><!--/navbar-->		
		<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				 <ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="#home" class="scroll">home</a></li>
					<li><a href="#about" class="scroll">about</a></li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="#team" class="scroll">team</a></li>
						<li><a href="#counter" class="scroll">stat</a></li>
					 </ul>
					</li>
					<li><a href="#services" class="scroll">prestasi</a></li>
					<li><a href="#gallery" class="scroll">gallery</a></li>
					<li><a href="#" class="scroll">artikel</a></li>
				</ul>
		 </div><!--/nav-collpase-->
	</nav><!--/nav-->
	<div class="agile-text">
		<h2>education is key to success</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
	</div>
	<div class="clearfix"></div>
	</div>
</section>
<!--about-->
<section class="agile-about" id="about">
	<h4 class="header">about us</h4>
	<div class="line"></div>
	<div class="container">
		
			
			<center><h4>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</h4></center>
			
			</div>
		</div>
	
	</div>
</section>
<!--/about-->
<!--services-->
    @php
	$prestasis = App\Prestasi::all();
	@endphp
<section class="agile-services" id="services">
<h4 class="header">Prestasi</h4>
	<div class="line"></div>
	<div class="service-gridmain">
	@foreach($prestasis as $data)
				<div class="col-sm-3 col-xs-6 wthree_team_grid_left">
					<figure class="effect-julia">
						<a href="#"  data-target="#gurus">
					<img src="{{asset('assets/admin/images/icon/'.$data->foto.'')}}" width="350px;" height="250px;">
						<div class="w3l_banner_figure">
							<p>{{$data->nama_prestasi}}</p>
							<p>{{$data->deskripsi}}</p>
							</div>
						</div>
	@endforeach
	</div>
	</div>
</div>
	
	</div>
	<div class="clearfix"></div>
</div>
</div>
</section>
<!--/services-->
<!--team-->
@php
	$gurus = App\Guru::all();
	@endphp
<section class="agile-team" id="team">
<h4 class="header">Guru</h4>
	<div class="line"></div>
	<div class="container">
		@foreach($gurus as $data)
				<div class="wthree_team_agileinfo">
				<div class="col-sm-3 col-xs-6 wthree_team_grid_left">
					<figure class="effect-julia">
						<a href="#"  data-target="#gurus">
					<img src="{{asset('assets/admin/images/icon/'.$data->foto.'')}}" width="350px;" height="250px;">
						<div class="w3l_banner_figure">
							<p>{{$data->nama_guru}}</p>
							<p>
								<a href="#" class="social-button twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="social-button facebook"><i class="fa fa-facebook"></i></a> 
								<a href="#" class="social-button google"><i class="fa fa-google-plus"></i></a> 
								
							</p> 
							<p>{{$data->jabatan}}</p>
							</div>
						</div> 	
						@endforeach		
					</figure>
				</div>
		</section>

<!--/team-->
<!--gallery-->
@php
	$galeri = App\Galeri::all();
	@endphp
<section class="agile-gallery" id="gallery">
<h4 class="header">Galeri</h4>
	<div class="line"></div>
	<div class="container">
	@foreach($galeri as $data)
		<div class="agile-work">
				<div class="col-md-4 gallery-works">
				<a href="#" class="gallery-box" data-lightbox="example-set" data-title="zoom-img">
					<img src="{{asset('assets/admin/images/icon/'.$data->foto.'')}}" alt="" class="img-responsive ">
				</a>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
	</div>
</section>
<!--/gallery-->
<!--blog-->
<section class="agile-blog" id="blog">
<h4 class="header">our blog</h4>
	<div class="line"></div>
	<div class="col-md-4 agile-blogup">
	<h6>upcoming events</h6>
		<div class="upblock">
			<ul>
				<li>
					<div class="left">
						<span class="date">08</span>
						<span class="month">jan</span>
						
					</div>
					<div class="right">
						<h5>sunday meetup</h5>
						<span>sunday 10:00 AM -12:00 PM</span>
						<label>123 Broadway, New York, NY 10006, USA</label>
					</div>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="middleblock">
			<ul>
				<li>
					<div class="left">
						<span class="date">05</span>
						<span class="month">mar</span>
						
					</div>
					<div class="right">
						<h5>alumini</h5>
						<span>sunday 10:00 AM -12:00 PM</span>
						<label>123 Broadway, New York, NY 10006, USA</label>
					</div>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="lastblock">
			<ul>
				<li>
					<div class="left">
						<span class="date">01</span>
						<span class="month">may</span>
						
					</div>
					<div class="right">
						<h5>freshers days</h5>
						<span>sunday 10:00 AM -12:00 PM</span>
						<label>123 Broadway, New York, NY 10006, USA</label>
					</div>
				</li>
			</ul>
		</div>
	</div>
	@php
	$artikel= App\Artikel::all();
	@endphp
	<div class="agile-blogmain">
	<h6>Berita Sekolah</h6>
	@foreach($artikel as $data)
	<div class="col-md-4 agile-blogmiddle">
	<img src="{{asset('assets/admin/images/icon/'.$data->foto.'')}}"width="350px;" height="250px;" alt="blog1" >
	<div class="agile-bg">
		<div class="agile-blog1">
			<span class="date1">10</span>
			<span class="month1">apr</span>
		</div>
		<div class="agile-blogtext">
			<p><a  class="w3_play_icon" href="#small-dialog1">{{$data->judul}}</a></p>
		</div>
		
		
		</div>
		@endforeach
	</div>
	<div class="clearfix"></div>
</section>
<!--/blog-->

<!--footer-->
<section class="agile-footer">
	<footer>&copy; 2018 ingenious responsive template.All Rights Reserved.Designed by <a href="http://www.w3layouts.com" target="blank">w3layouts</a></footer>
</section>
<!--/footer-->
<div id="small-dialog1" class="mfp-hide">
<div class="header-form1">
<img src="{{asset('assets/admin/images/icon/'.$data->foto.'')}}" alt="blog">
<h4>{{$data->konten}}</h4>

</div>	

</div>
<script src="assets/user/js/lightbox-plus-jquery.min.js"></script>
<script src="assets/user/js/bootstrap.js"></script>
<script src="assets/user/js/jquery-2.1.4.min.js"></script>
<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="assets/user/js/move-top.js"></script>
	<script type="text/javascript" src="assets/user/js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	


<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
<!-- js for smooth scrollings -->
	<script src="assets/user/js/SmoothScroll.min.js"></script>
<!-- js for smooth scrollings -->
<!-- //smooth-scrolling-of-move-up -->
<script src="assets/user/js/jquery.magnific-popup.js"></script>
<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			easing: 'ease-in-out', 
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
</script>

</body>
</html>
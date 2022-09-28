<?php  
		use App\View\Components\frontend\Menu;
		use App\View\Components\frontend\SlideShow;
		use App\View\Components\frontend\ProductByCat;
		use App\View\Components\frontend\BottomLink;
		use App\View\Components\frontend\BannerSale;
		use App\View\Components\frontend\SmallBannerSale;
		use App\View\Components\frontend\TrendingItem;
		use App\View\Components\frontend\MidBannerSale;
		use App\View\Components\frontend\ShopHomeList;
		use App\View\Components\frontend\Topbar;
		use App\View\Components\frontend\UnderTopbar;
		use App\View\Components\frontend\Cowndown;
		use App\View\Components\frontend\ShopBlog;
		use App\View\Components\frontend\ShopServices;
		use App\View\Components\frontend\Newsletter;
		use App\View\Components\frontend\Modal;
		use App\View\Components\frontend\FooterBottom;
		use App\View\Components\frontend\WomanProduct;

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta name="_token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{asset('template/frontend/images/favicon.png')}}">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{asset('template/frontend/css/bootstrap.css')}}">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('template/frontend/css/magnific-popup.min.css')}}">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template/frontend/css/font-awesome.css')}}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{asset('template/frontend/css/jquery.fancybox.min.css')}}">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{asset('template/frontend/css/themify-icons.css')}}">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('template/frontend/css/niceselect.css')}}">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('template/frontend/css/animate.css')}}">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{asset('template/frontend/css/flex-slider.min.css')}}">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('template/frontend/css/owl-carousel.css')}}">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{asset('template/frontend/css/slicknav.min.css')}}">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{asset('template/frontend/css/reset.css')}}">
	<link rel="stylesheet" href="{{asset('template/frontend/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/frontend/css/responsive.css')}}">

	
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
			<x-frontend.Topbar/>
		<!-- End Topbar -->

		<!-- Under Topbar -->
			<x-frontend.UnderTopbar/>
		<!-- End Under Topbar -->
        <div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
												<li class="active"><a href="{{$path}}">Home</a></li>
												<li><a href="#">Product</a></li>												
												<li><a href="#">Service</a></li>
												<li><a href="#">Shop<i class="ti-angle-down"></i></a>
													<ul class="dropdown">
														<li><a href="{{$path}}cart">Cart</a></li>
														<li><a href="{{$path}}checkout">Checkout</a></li>
													</ul>
												</li>
												<li><a href="{{$path}}contact">Contact Us</a></li>
											</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
    <div class="row">
    	<div class="col-lg-4 col-lg-offset-4">
        	<div class="input-group">
        		<input name="search" id="search" placeholder="Search Products Here....." type="search" style="margin-left:500px;margin-top:50px;">
                
            </div><!-- /input-group -->
        </div><!-- /.col-lg-4 -->
    </div>
    
    <div class="product-area section">
    <div class="container">
		
		<div class="row">
			<div class="col-12">
				<div class="product-info">
					<div class="tab-content" id="myTabContent">
						<!-- Start Single Tab -->
						<div class="tab-pane fade show active" id="man" role="tabpanel">
							<div class="tab-single">
								<div class="row" id="content">
									@foreach ($products as $p)
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
										<div class="single-product">
											<div class="product-img">
												<a href="{{$path}}detail/{{$p->slug}}">
													<img class="default-img" src="{{$path}}template/frontend/images/{{$p->image}}" alt="#">
													<img class="hover-img" src="{{$path}}template/frontend/images/{{$p->image}}" alt="#">
													
												</a>
												<div class="button-head">
													<div class="product-action">
														<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
														<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
														<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
													</div>
													<div class="product-action-2">
														<a title="Add to cart" href="{{$path}}cartAdd/{{$p->slug}}">Add to cart</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h3><a href="{{$path}}detail/{{$p->slug}}">{{$p->productName}}</a></h3>
												<div class="product-price">
													<span class="old">{{$p->price}}</span>
													<span>{{$p->salePrice}}</span>
												</div>
											</div>
										</div>
									</div>
                                    @endforeach
								</div>
							</div>
						</div>
						<!--/ End Single Tab -->
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<div clas="pagination">
</div>
<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="{{asset('template/frontend/images/logo2.png')}}" alt="#"></a>
							</div>
							<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
							<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<div class="single-footer links">
							<h4>Information</h4>
							<x-frontend.BottomLink pos=3/>
						</div>		
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<x-frontend.BottomLink pos=4/>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>NO. 342 - London Oxford Street.</li>
									<li>012 United Kingdom.</li>
									<li>info@eshop.com</li>
									<li>+032 3456 7890</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->

		<!-- Footer Bottom -->
			<x-frontend.FooterBottom/>
		<!-- End Footer Bottom -->
		
	</footer>
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="{{asset('template/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('template/frontend/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('template/frontend/js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{asset('template/frontend/js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('template/frontend/js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	<script src="{{asset('template/frontend/js/colors.js')}}"></script>
	<!-- Slicknav JS -->
	<script src="{{asset('template/frontend/js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('template/frontend/js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{asset('template/frontend/js/magnific-popup.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{asset('template/frontend/js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{asset('template/frontend/js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{asset('template/frontend/js/nicesellect.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{asset('template/frontend/js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{asset('template/frontend/js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{asset('template/frontend/js/onepage-nav.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{asset('template/frontend/js/easing.js')}}"></script>
	<!-- Active JS -->
	<script src="{{asset('template/frontend/js/active.js')}}"></script>
	<!-- Product Detail -->
	<script>$(document).ready(function () {
		// MDB Lightbox Init
  			$(function () {
    		$("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
  			});
		});


        $('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('search') }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('#content').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
	</script>
	
</body>
</html>
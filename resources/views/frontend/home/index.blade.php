@extends('frontend.main')

@section('content')
    <!-- Slider Area -->
	<section class="hero-slider">
		<!-- Single Slider -->
			<x-frontend.BannerSale/>
		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->
	
	<!-- Start Small Banner  -->
		<x-frontend.SmallBannerSale/>
	<!-- End Small Banner -->
	
	<!-- Start Product Area -->
		<x-frontend.TrendingItem/>
	<!-- End Product Area -->

	<!-- Start Midium Banner  -->
		<x-frontend.MidBannerSale/>
	<!-- End Midium Banner -->
	
	<!-- Start Product By Cat -->
		
		
		@foreach ($catsShowHome as $cat)
		<x-frontend.ProductByCat :catId="$cat->id" :catName="$cat->catName"/>
		@endforeach

	<!-- End Product By Cat -->

	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Hot Item</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
					<!-- SlideShow Begin -->
						<x-frontend.SlideShow/>

					<!-- SlideShow End -->
                    
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->
	
	<!-- Start Shop Home List  -->
	<!-- End Shop Home List  -->
	
	<!-- Start Cowndown Area -->
		<x-frontend.CownDown/>
	<!-- /End Cowndown Area -->
	
	<!-- Start Shop Blog  -->
		<x-frontend.ShopBlog/>
	<!-- End Shop Blog  -->
	
	<!-- Start Shop Services Area -->
	
	<!-- End Shop Services Area -->
		<x-frontend.ShopServices/>
	<!-- Start Shop Newsletter  -->
		<x-frontend.NewsLetter/>
	<!-- End Shop Newsletter -->
	
	<!-- Modal -->
	<x-frontend.Modal/>
    <!-- Modal end -->
@endsection('content')
<?php
    use App\View\Components\frontend\WomanProduct;
    use App\View\Components\frontend\MenProduct;
	
?>

<div class="product-area section">
    <div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Trending Item</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="product-info">
					<div class="nav-main">
						<!-- Tab Nav -->
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#man" role="tab">Man</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab">Woman</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids" role="tab">Kids</a></li>
							<!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#accessories" role="tab">Accessories</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#essential" role="tab">Essential</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#prices" role="tab">Prices</a></li> -->
						</ul>
						<!--/ End Tab Nav -->
					</div>
					<div class="tab-content" id="myTabContent">
						<!-- MenProduct -->
						<!-- Start Single Tab -->
						<div class="tab-pane fade show active" id="man" role="tabpanel">
							<div class="tab-single">
								<div class="row">
								@foreach ($menProducts as $wp)
		
	
		<div class="col-xl-3 col-lg-4 col-md-4 col-12">
			<div class="single-product">
				<div class="product-img">
					<a href="{{$path}}detail/{{$wp->slug}}">
						<img class="default-img" src="{{$path}}template/frontend/images/{{$wp->image}}" alt="#">
						<img class="hover-img" src="{{$path}}template/frontend/images/{{$wp->image}}" alt="#">
					</a>
					<div class="button-head">
						<div class="product-action">
							<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
							<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
							<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
						</div>
						<div class="product-action-2">
							<a title="Add to cart" href="{{$path}}cartAdd/{{$wp->slug}}">Add to cart</a>
						</div>
					</div>
				</div>
				<div class="product-content">
					<h3><a href="{{$path}}detail/{{$wp->slug}}">{{$wp->productName}}</a></h3>
					<div class="product-price">
						<span class="old">{{$wp->price}}</span>
						<span>{{$wp->salePrice}}</span>
					</div>
				</div>
			</div>
		</div>
		@endforeach
									
									
								</div>
							</div>
						</div>
						<!--/ End Single Tab -->
						<!-- WomenProduct -->
						<!-- Start Single Tab -->
						<div class="tab-pane fade" id="women" role="tabpanel">
							<div class="tab-single">
								<div class="row">
								@foreach ($womenProducts as $wp)
		
	
	<div class="col-xl-3 col-lg-4 col-md-4 col-12">
		<div class="single-product">
			<div class="product-img">
				<a href="{{$path}}detail/{{$wp->slug}}">
					<img class="default-img" src="{{$path}}template/frontend/images/{{$wp->image}}" alt="#">
					<img class="hover-img" src="{{$path}}template/frontend/images/{{$wp->image}}" alt="#">
				</a>
				<div class="button-head">
					<div class="product-action">
						<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
						<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
						<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
					</div>
					<div class="product-action-2">
						<a title="Add to cart" href="{{$path}}cartAdd/{{$wp->slug}}">Add to cart</a>
					</div>
				</div>
			</div>
			<div class="product-content">
				<h3><a href="{{$path}}detail/{{$wp->slug}}">{{$wp->productName}}</a></h3>
				<div class="product-price">
				<span class="old">{{$wp->price}}</span>
				<span>{{$wp->salePrice}}</span>
					
				</div>
			</div>
		</div>
	</div>
	@endforeach
									
									
								</div>
							</div>
						</div>
						<!--/ End Single Tab -->
						<!-- KidProduct -->
						<!-- Start Single Tab -->
						<div class="tab-pane fade" id="kids" role="tabpanel">
							<div class="tab-single">
								<div class="row">
								@foreach ($childProducts as $cp)
		
	
		<div class="col-xl-3 col-lg-4 col-md-4 col-12">
			<div class="single-product">
				<div class="product-img">
					<a href="{{$path}}detail/{{$cp->slug}}">
						<img class="default-img" src="{{$path}}template/frontend/images/{{$cp->image}}" alt="#">
						<img class="hover-img" src="{{$path}}template/frontend/images/{{$cp->image}}" alt="#">
					</a>
					<div class="button-head">
						<div class="product-action">
							<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
							<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
							<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
						</div>
						<div class="product-action-2">
							<a title="Add to cart" href="{{$path}}cartAdd/{{$cp->slug}}">Add to cart</a>
						</div>
					</div>
				</div>
				<div class="product-content">
					<h3><a href="{{$path}}detail/{{$cp->slug}}">{{$cp->productName}}</a></h3>
					<div class="product-price">
						<span>{{$cp->price}}</span>
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
<!-- <script type="text/javascript"> 
	var womenNode = document.querySelector(".product-area .container .product-info .nav-main ul li:nth-child(2)");
	var node = document.querySelector(".product-area .container .product-info .tab-content .tab-single .row");
	node.innerHtml = "1";
	$(document).ready(function(){
		womenNode.click(function(){
			//$(node).innerText = {{<x-frontend.MenProduct/>}};
			alert("hello");
		});
	});
	
</script>-->

<!-- 
<script type="text/javascript">
var womenNode = document.querySelector(".product-area .container .product-info .nav-main ul li:nth-child(2");
var node = document.querySelector(".product-area .container .product-info .tab-content .tab-single");
node.innerText =  "<x\-frontend.MenProduct/>";
console.log("<x\-frontend.MenProduct/>");

</script> -->



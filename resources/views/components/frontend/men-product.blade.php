<div class="row">
	@foreach ($womenProduct as $wp)
		
	
	<div class="col-xl-3 col-lg-4 col-md-4 col-12">
		<div class="single-product">
			<div class="product-img">
				<a href="product-details.html">
					<img class="default-img" src="{{$path}}template/frontend/images/{{$wp->image}}" alt="#">
					<img class="hover-img" src="{{$path}}template/frontend/images/{{$wp->image}}" alt="#">
				</a>
				<div class="button-head">
					<div class="product-action">
						<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
						<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
						<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
					<div class="product-action-2">
						<a title="Add to cart" href="#">Add to cart</a>
					</div>
				</div>
			</div>
			<div class="product-content">
				<h3><a href="product-details.html">{{$wp->productName}}</a></h3>
				<div class="product-price">
					<span>{{$wp->price}}</span>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	
	
</div>
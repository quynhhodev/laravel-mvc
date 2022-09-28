<div class="owl-carousel popular-slider">
	<!-- Start Single Product -->
    @foreach ($hotProducts as $hotProduct)
        <div class="single-product">
            <div class="product-img">
                <a href="{{$path}}detail/{{$hotProduct->slug}}">
                    <img class="default-img" src="{{$path}}template/frontend/images/{{$hotProduct->image}}" alt="#">
                    <img class="hover-img" src="{{$path}}template/frontend/images/{{$hotProduct->image}}" alt="#">
                </a>
                <div class="button-head">
                    <div class="product-action">
                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                    </div>
                    <div class="product-action-2">
                        <a title="Add to cart" href="{{$path}}cartAdd/{{$hotProduct->slug}}">Add to cart</a>
                    </div>
                </div>
            </div>
            <div class="product-content">
                <h3><a href="{{$path}}detail/{{$hotProduct->slug}}">{{$hotProduct->productName}}</a></h3>
                <div class="product-price">
                    <span class="old">{{$hotProduct->price}}</span>
                    <span>{{$hotProduct->salePrice}}</span>
                </div>
            </div>
        </div>
    @endforeach

	<!-- End Single Product -->
</div>
@extends('frontend.unmain')
@section('content')

<div class="product-area section">
    <div class="container">
		
		<div class="row">
			<div class="col-12">
				<div class="product-info">
					<div class="tab-content" id="myTabContent">
						<!-- Start Single Tab -->
						<div class="tab-pane fade show active" id="man" role="tabpanel">
							<div class="tab-single">
								<div class="row">
									@foreach ($products as $p)
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
										<div class="single-product">
											<div class="product-img">
												<a href="{{$path}}detail/{{$p->slug}}">
													<img class="default-img" src="{{$path}}template/frontend/images/{{$p->image}}" alt="#">
													<img class="hover-img" src="{{$path}}template/frontend/images/{{$p->image}}" alt="#">
													<span class="out-of-stock">Hot</span>
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
<!--  -->


@endsection
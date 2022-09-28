<div class="middle-inner">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-12 pl-5">
				<!-- Logo -->
				<div class="logo ">
					<a href="{{$path}}"><img src="{{asset('template/frontend/images/logo.png')}}" class="rounded mx-auto d-block" alt="logo"></a>
				</div>
				<!--/ End Logo -->
				<!-- Search Form -->
				<div class="search-top">
					<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
					<!-- Search Form -->
					<div class="search-top">
						<form action="{{$path}}searchProduct" method="get" class="search-form">
							<input type="text"  placeholder="Search here..." >
							<button value="search"  type="submit"><i class="ti-search"></i></button>
						</form>
					</div>
					<!--/ End Search Form -->
				</div>
				<!--/ End Search Form -->
				<div class="mobile-nav"></div>
			</div>
			<div class="col-lg-2 col-md-3 col-12">
				<div class="right-bar">
					<!-- Search Form -->
					<div class="sinlge-bar">
						<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
					</div>
					<div class="sinlge-bar">
						<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
					</div>
					<div class="sinlge-bar shopping">
						<x-frontend.Viewcart/>
						<!-- Shopping Item -->
						<!-- <div class="shopping-item">
							<div class="dropdown-cart-header">
								<span>2 Items</span>
								<a href="#">View Cart</a>
							</div>
							<ul class="shopping-list">
								<li>
									<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
									<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
									<h4><a href="#">Woman Ring</a></h4>
									<p class="quantity">1x - <span class="amount">$99.00</span></p>
								</li>
								<li>
									<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
									<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
									<h4><a href="#">Woman Necklace</a></h4>
									<p class="quantity">1x - <span class="amount">$35.00</span></p>
								</li>
							</ul>
							<div class="bottom">
								<div class="total">
									<span>Total</span>
									<span class="total-amount">$134.00</span>
								</div>
								<a href="checkout.html" class="btn animate">Checkout</a>
							</div>
						</div> -->
						<!--/ End Shopping Item -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>